<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.page.permission.index');
    }

    public function getPermissions(Request $request)
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
        $totalRecords = Permission::select('count(*) as allcount')->whereNot('parent_id',null)->count();
        $totalRecordswithFilter = Permission::select('count(*) as allcount')
            ->whereNot('parent_id',null) 
            ->where('name', 'like', '%' . $searchValue . '%') 
            ->count();

        // Fetch records
        $permissions = Permission::orderBy($columnName, $columnSortOrder)  
            ->whereNot('parent_id',null) 
            ->where('permissions.name', 'like', '%' . $searchValue . '%') 
            ->select('permissions.*')
            ->skip($start)
            ->take($rowperpage)
            ->get(); 
        
 
            
        $data_arr = array(); 
        foreach ($permissions as $key => $permission) {
            $id = $key += 1;
            $name = $permission->name;   
            if($permission->parent_id % 2 == 0)  { 
            $parent_id =  '<span class="badge bg-label-warning m-1">'. $permission->parent->name .'</span>' ;  
            } else {
                $parent_id =  '<span class="badge bg-label-info m-1">'. $permission->parent->name .'</span>' ;  
            }      
 
            $actions = Blade::render("admin.page.permission.table.actions", compact('permission')); //action buttons
 
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

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return to_route('admin.permission.index')->with('toast-success','مجوز حذف گردید') ;
    }
}
