<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Organization\OrganizationRequest;
use App\Models\Organization;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Intervention\Image\ImageManagerStatic as Image;  
use function App\Helpers\jFF;

class OrganizationController extends Controller
{
    public function index()
    { 
        return view('admin.page.organization.index');
    }

    public function getOrgs(Request $request)
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
        $totalRecords = Organization::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Organization::select('count(*) as allcount')
            ->where('title', 'like', '%' . $searchValue . '%')   
            ->orWhere('national_code', 'like', '%' . $searchValue . '%')   
            ->count();

        // Fetch records
        $orgs = Organization::orderBy($columnName, $columnSortOrder) 
            ->where('organizations.title', 'like', '%' . $searchValue . '%')  
            ->orWhere('organizations.national_code', 'like', '%' . $searchValue . '%')  
            ->select('organizations.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array(); 
        
        foreach ($orgs as $key => $org) {
            $id = $key += 1;
            if($org->logo == null)
            {
                $title = '<img class="rounded-circle" src="https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_170,w_170,f_auto,b_white,q_auto:eco,dpr_1/v1488900775/hkx40wm1lkzzqy35kptv.png" width="30" height="30">'.' '.$org->title; 
            } else
            {
                $title = '<img class="rounded-circle" src="'. asset($org->logo) .'" width="30" height="30">'.' '.$org->title; 
            }
            if($org->manager->avatar == null)
            {
                $manager_id = '<img class="rounded-circle" src="https://www.psi.org.kh/wp-content/uploads/2019/01/profile-icon-300x300.png" width="30" height="30">'.' '.$org->manager->full_name; 
            } else
            {
                $manager_id = '<img class="rounded-circle" src="'. asset($org->manager->avatar) .'" width="30" height="30">'.' '.$org->manager->full_name; 
            }
            $national_code = $org->national_code;    
            $countUsers = Blade::render("admin.page.organization.table.avatars",compact('org'));    
            $actions = Blade::render("admin.page.organization.table.actions",compact('org'));    


            $data_arr[] = array(
                "id" => $id,
                "title" => $title, 
                "manager_id" => $manager_id, 
                "national_code" => $national_code,  
                "countUsers" => $countUsers,  
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

    public function selectParent(Request $request)
    {  
        $search = $request->search;
  
        if($search == ''){
           $orgs = Organization::orderby('title','DESC')
           ->select('id','title')
           ->limit(2)
           ->get();
        }else{
           $orgs = Organization::orderby('title','DESC')
           ->select('id','title')
           ->where('title', 'like', '%' .$search . '%')
           ->limit(2)
           ->get();
        } 
        $response = array();
        array_push($response,['id' => 0 , 'text' => 'بدون والد']);
        foreach($orgs as $org){
           $response[] = array(
                "id"=>$org->id,
                "text"=>$org->title
           );
        }
        return response()->json($response); 
    } 
    
    public function selectManager(Request $request)
    {  
        $search = $request->search;
  
        if($search == ''){
           $users = User::orderby('id','DESC')
           ->select('id','username','first_name','last_name')
           ->limit(5)
           ->get()
           ->except(1);
        }else{
           $users = User::orderby('id','DESC')
           ->select('id','username','first_name','last_name')
           ->where('username', 'like', '%' .$search . '%')
           ->orWhere('first_name', 'like', '%' .$search . '%')
           ->orWhere('last_name', 'like', '%' .$search . '%')
           ->limit(5)
           ->get()
           ->except(1);
        }
  
        $response = array();
        foreach($users as $user){
           $response[] = array(
                "id"=>$user->id,
                "text"=>$user->last_name . ' ' . $user->first_name  .' - ' . $user->username
           );
        }
        return response()->json($response); 
    }  

    public function create()
    {
        $roles = Role::where('name','organizations')->orderBy('id' , 'DESC')->get();
        $users = User::all()->except(1);
        $orgs = Organization::all();

        return view('admin.page.organization.create',compact('roles','users','orgs'));
    }

    public function store(OrganizationRequest $request)
    { 
        $inputs = $request->all();
        if($request->hasFile('logo'))
        {
            //set File
            $file = $request->file('logo');
            $logoName = $request->national_code . '.' . $file->extension();
            $pathFolder = 'storage' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR .
            'avatars' . DIRECTORY_SEPARATOR . 'logos' . DIRECTORY_SEPARATOR . jFF('Y');
            //create path folder
            if (!file_exists($pathFolder)) {
                mkdir($pathFolder, 0777, true);
            }
            $path =  $pathFolder . DIRECTORY_SEPARATOR . $logoName; 
            //save file
            $image = Image::make($file)->resize(335, 335);
            $image->save($path, 50, $file->extension()); 
            $inputs['logo'] = $path; 
        }
        $request->parent_id == 0 ? $inputs['parent_id'] = null : $inputs['parent_id'] = $request->parent_id;

        $org = Organization::create($inputs);

        if($request->role){ $org->syncRoles($request->role); }
        
        return to_route('admin.organization.index')->with('toast-success' , 'سازمان با موفقیت ایجاد شد');
    }

    public function selectParentEdit(Organization $organization,Request $request)
    {   
        $search = $request->search;
  
        if($search == ''){
           $orgs = Organization::orderby('title','DESC')
           ->select('id','title')
           ->limit(2)
           ->get()
           ->except($organization->id);
        }else{
           $orgs = Organization::orderby('title','DESC')
           ->select('id','title')
           ->where('title', 'like', '%' .$search . '%')
           ->limit(2)
           ->get()
           ->except($organization->id); 
        } 
        $response = array();
        array_push($response,['id' => 0 , 'text' => 'بدون والد']);
        foreach($orgs as $org){
           $response[] = array(
                "id"=>$org->id,
                "text"=>$org->title
           );
        }
        return response()->json($response); 
    
    }
 
    public function edit(Organization $organization)
    {
        $role = Role::where('name','organizations')->first();
        $users = User::all()->except(1);
        $orgs = Organization::all();

        return view('admin.page.organization.edit',compact('role','users','orgs','organization'));
    }
 
    public function update(OrganizationRequest $request , Organization $organization)
    {
        $inputs = $request->all();

        if($request->hasFile('logo'))
        {
             //remove old logo
             if ($organization->logo != null) {
                if (file_exists(public_path($organization->logo))) {
                    unlink(public_path($organization->logo));
                }
            }
            //set File
            $file = $request->file('logo');
            $logoName = $request->national_code . '.' . $file->extension();
            $pathFolder = 'storage' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR .
            'avatars' . DIRECTORY_SEPARATOR . 'logos' . DIRECTORY_SEPARATOR . jFF('Y');
            //create path folder
            if (!file_exists($pathFolder)) {
                mkdir($pathFolder, 0777, true);
            }
            $path =  $pathFolder . DIRECTORY_SEPARATOR . $logoName; 
            //save file
            $image = Image::make($file)->resize(335, 335);
            $image->save($path, 50, $file->extension()); 
            $inputs['logo'] = $path; 
        }

        $request->parent_id == 0 ? $inputs['parent_id'] = null : $inputs['parent_id'] = $request->parent_id;
        $organization->update($inputs);

        if($request->role){ $organization->syncRoles($request->role); }
        
        return to_route('admin.organization.index')->with('toast-success' , 'سازمان با موفقیت ویرایش شد');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();
        $organization->roles()->detach();
        $organization->permissions()->detach();
        return back()->with('toast-success','سازمان مورد نظر حذف گردید');
    } 
    
}
