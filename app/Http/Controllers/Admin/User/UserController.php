<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Organization;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image; 

use function App\Helpers\avatarName;
use function App\Helpers\jFF;

class UserController extends Controller
{
    public function index()
    {   
        $countUsers = User::all()->count();
        return view('admin.page.user.index',compact('countUsers')); 
    }
 
    public function getUsers(Request $request)
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
        $totalRecords = User::select('count(*) as allcount')->count();
        $totalRecordswithFilter = User::select('count(*) as allcount')
            ->where('username', 'like', '%' . $searchValue . '%') 
            ->orWhere('first_name', 'like', '%' . $searchValue . '%') 
            ->orWhere('last_name', 'like', '%' . $searchValue . '%') 
            ->count();

        // Fetch records
        $users = User::orderBy($columnName, $columnSortOrder) 
            ->where('users.username', 'like', '%' . $searchValue . '%') 
            ->orWhere('users.first_name', 'like', '%' . $searchValue . '%') 
            ->orWhere('users.last_name', 'like', '%' . $searchValue . '%') 
            ->select('users.*')
            ->skip($start)
            ->take($rowperpage)
            ->get()
            ->except(1);

        $data_arr = array();

        $roles = $roles = Role::where('parent_id',1)->orderBy('id' , 'DESC')->get()->except([3,5]); //ROLES
        foreach ($users as $key => $user) {
            $id = $key += 1;
            $username = $user->username; 
            $role = Blade::render("admin.page.user.table.role", compact('user','roles')); //lable roles
            if($user->avatar == null)
            {
                $full_name = '<img class="rounded-circle" src="https://www.psi.org.kh/wp-content/uploads/2019/01/profile-icon-300x300.png" width="30" height="30">'.' '.$user->last_name. ' - ' . $user->first_name;
            } else{
                $full_name = '<img class="rounded-circle" src="'. asset($user->avatar) .'" width="30" height="30">'.' '.$user->last_name. ' - ' . $user->first_name;
            }

            $mobile = $user->mobile; 
            if($user->organization->logo == null)
            {
                $organization_id = '<img class="rounded-circle" src="https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_170,w_170,f_auto,b_white,q_auto:eco,dpr_1/v1488900775/hkx40wm1lkzzqy35kptv.png" width="30" height="30">'. ' '.  $user->organization->title;
            } else{
                $organization_id = '<img class="rounded-circle" src="'. asset($user->organization->logo) .'" width="30" height="30">'. ' '.  $user->organization->title;
            }


            
            $actions = Blade::render("admin.page.user.table.actions", compact('user','roles')); //action buttons
 
            $data_arr[] = array(
                "id" => $id,
                "username" => $username,
                "role" => $role,
                "last_name" => $full_name, 
                "mobile" => $mobile, 
                "organization_id" => $organization_id, 
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
    
    public function selectOrg(Request $request)
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
        foreach($orgs as $org){
           $response[] = array(
                "id"=>$org->id,
                "text"=>$org->title
           );
        }
        return response()->json($response); 
    } 
    
     public function create()
    {
        $roles = Role::where('key','users')->orderBy('id' , 'DESC')->get(); 
        $orgs = Organization::orderBy('id','desc')->get();  

        return view('admin.page.user.create',compact('roles','orgs')); 
    }

    public function store(UserRequest $request)
    {    
        $inputs= $request->all(); 

        if ($request->hasfile('avatar')) { 
            //set file
            $file = $request->file('avatar');
            $fileName = $request->username . avatarName() . '.' . $file->extension();
            $pathFolder = 'storage' . DIRECTORY_SEPARATOR .
             'files' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR. 'users' . DIRECTORY_SEPARATOR . jFF('Y');
            //create path folder
            if (!file_exists($pathFolder)) {
                mkdir($pathFolder, 0777, true);
            }
            $path = $pathFolder . DIRECTORY_SEPARATOR . $fileName; 
            //save file
            $image = Image::make($file)->resize(335, 335);
            $image->save($path, 50, $file->extension()); 
            $inputs['avatar'] = $path;
        }
        $inputs['password'] = Hash::make($request->password);
        $inputs['organization_id'] = $request->organization_id;

        $user = User::create($inputs);
        $user->syncRoles($request->role);
 

        return redirect()->route('admin.user.index')->with('toast-success','کاربر جدید ایجاد شد');
    }

    public function setRole(User $user,Request $request) 
    {
        $user->syncRoles($request->role);
        return back()->with('toast-success','نقش کاربر را تغییر دادید');
    }

    public function edit(User $user)
    { 
        $roles = Role::where('key','users')->orderBy('id' , 'DESC')->get()->except([3,5]);
        $orgs = Organization::orderBy('id','desc')->get(); 
        return view('admin.page.user.edit',compact('user','orgs','roles'));
    }

    public function update(User $user, UserRequest $request)
    { 
        $inputs = $request->all();

        //change password
        if($inputs['password'])
        {
           $inputs['password'] = Hash::make($request->password);
        } else { 
            unset($inputs['password']);
        }  
        
        //change avatar
        if ($request->hasfile('avatar')) { 
             //remove old avatar
             if ($user->avatar != null) {
                if (file_exists(public_path($user->avatar))) {
                    unlink(public_path($user->avatar));
                }
            }
            //set file
            $file = $request->file('avatar');
            $fileName = $request->username . avatarName() . '.' . $file->extension();
            $pathFolder = 'storage' . DIRECTORY_SEPARATOR .
             'files' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR. 'users' . DIRECTORY_SEPARATOR . jFF('Y');
            //create path folder
            if (!file_exists($pathFolder)) {
                mkdir($pathFolder, 0777, true);
            }
            $path = $pathFolder . DIRECTORY_SEPARATOR . $fileName; 
            //save file
            $image = Image::make($file)->resize(335, 335);
            $image->save($path, 50, $file->extension()); 
            $inputs['avatar'] = $path; 
        }
        
        $inputs['organization_id'] = $request->organization_id; 
        $user->syncRoles($request->role);
        $user->update($inputs);
        return to_route('admin.user.index')->with('toast-success','کاربر با موفقیت ویرایش شد');
    }
    
    public function destroy(User $user)
    {  
        $user->delete(); 
        $user->roles()->detach();
        $user->permissions()->detach(); 
        return to_route('admin.user.index')->with('toast-revert',''.$user->id.'');
    }
    
    public function revert($id)
    {       
        User::withTrashed()->find($id)->restore();
        return to_route('admin.user.index')->with('toast-success','کاربر با موفقیت برگردانده شد');
    }
}
