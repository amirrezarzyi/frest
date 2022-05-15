<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Organization\OrganizationController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return  to_route('admin.dashboard'); });


Route::prefix('/admin')->middleware(['auth'])->group(function () {

    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
 
    //User
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');  
        Route::get('/getUsers', [UserController::class, 'getUsers'])->name('admin.user.getUsers');  
        Route::post('/selectOrg', [UserController::class, 'selectOrg'])->name('admin.user.selectOrg');   
        Route::get('/craete', [UserController::class, 'create'])->name('admin.user.create');  
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');  
        Route::post('/set-role/{user}', [UserController::class, 'setRole'])->name('admin.user.set-role');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit'); 
        Route::put('/update/{user}', [UserController::class, 'update'])->name('admin.user.update'); 
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy'); 
        Route::post('/revert/{id}', [UserController::class, 'revert'])->name('admin.user.revert'); 
    }); 

    //Organization
    Route::prefix('organization')->group(function () {
        Route::get('/', [OrganizationController::class, 'index'])->name('admin.organization.index');      
        Route::get('/getOrgs', [OrganizationController::class, 'getOrgs'])->name('admin.organization.getOrgs');    
        Route::post('/selectParent', [OrganizationController::class, 'selectParent'])->name('admin.organization.selectParent');  
        Route::post('/selectManager', [OrganizationController::class, 'selectManager'])->name('admin.organization.selectManager');  
        Route::get('/create', [OrganizationController::class, 'create'])->name('admin.organization.create');   
        Route::post('/store', [OrganizationController::class, 'store'])->name('admin.organization.store');   
        Route::post('/selectParentEdit/{organization}', [OrganizationController::class, 'selectParentEdit'])->name('admin.organization.selectParentEdit');  
        Route::get('/edit/{organization}', [OrganizationController::class, 'edit'])->name('admin.organization.edit');   
        Route::put('/update/{organization}', [OrganizationController::class, 'update'])->name('admin.organization.update');   
        Route::delete('/destroy/{organization}', [OrganizationController::class, 'destroy'])->name('admin.organization.destroy');   
    }); 

    //Role
    Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');   
        Route::get('/getRoles', [RoleController::class, 'getRoles'])->name('admin.role.getRoles');
        Route::delete('/destroy/{role}', [RoleController::class, 'destroy'])->name('admin.role.destroy');
    }); 

    //Permission
    Route::prefix('permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('admin.permission.index');   
        Route::get('/getPermissions', [PermissionController::class, 'getPermissions'])->name('admin.permission.getPermissions');   
        Route::delete('/destroy/{permission}', [PermissionController::class, 'destroy'])->name('admin.permission.destroy');    
    }); 

});


//admin      
Route::view('/admin/profile', 'admin.page.user.profile')->name('admin.profile');
Route::view('/table', 'table')->name('table');
 

 