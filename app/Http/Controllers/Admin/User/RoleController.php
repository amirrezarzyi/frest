<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\SubSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

use function GuzzleHttp\Promise\all;

class RoleController extends Controller
{
    public function index()
    { 
        $userRoles = Role::where('parent_id',1)->orderBy('id','DESC')->get();
        $orgRoles = Role::where('parent_id',2)->orderBy('id','DESC')->get();  
        $groups = Role::where('parent_id',null)->get();  

        return view('admin.page.role.index',compact('userRoles','orgRoles','groups'));
    }

    public function getRoles(Request $request)
    { 
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Role::select('count(*) as allcount')->whereNot('parent_id',null)->count();
        $totalRecordswithFilter = Role::select('count(*) as allcount')
           ->whereNot('parent_id',null) 
            ->where('name', 'like', '%' . $searchValue . '%')    
            ->orWhere('parent_id', 'like', '%' . $searchValue . '%')    
            ->count();

        // Fetch records
        $roles = Role::orderBy($columnName, 'DESC') 
            ->whereNot('parent_id',null)
            ->where('roles.name', 'like', '%' . $searchValue . '%')   
            ->orWhere('parent_id', 'like', '%' . $searchValue . '%')    
            ->select('roles.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array(); 
        
        foreach ($roles as $key => $role) {
            $id = $key += 1; 
            $name = $role->name;  
            if($role->parent_id % 2 == 0)  { 
                $parent_id =  '<span class="badge bg-label-warning m-1">'. $role->parent->name .'</span>' ;  
                } else {
                    $parent_id =  '<span class="badge bg-label-info m-1">'. $role->parent->name .'</span>' ;  
                }     
            $actions = Blade::render("admin.page.role.table.actions", compact('role')); //action buttons

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,  
                "parent_id" => $parent_id,  
                "actions" => $actions,  
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    } 

    public function create()
    {
        $permissions = Permission::where('parent_id',null)->get();  
        $roleGroups = Role::where('parent_id',null)->get();  
        $subSystems = SubSystem::all();
        return view('admin.page.role.create',compact('permissions','roleGroups','subSystems'));
    }

    public function store(RoleRequest $request)
    { 
        $inputs = $request->all(); 
        $role = Role::create($inputs);
        $role->syncPermissions($inputs['permission']);
        return to_route('admin.role.index')->with('toast-success','نقش جدید ایجاد شد');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('admin.role.index')->with('toast-success','نقش انتخاب شده حذف گردید');
    }

}
