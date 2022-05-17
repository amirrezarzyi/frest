<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $roles = [
      ['title' => 'نقش های کاربران','name' => 'users',],
      ['title' => 'نقش های سازمانی','name' => 'organizations',], 
      ['title' => 'مدیر کاربران', 'parent_id' => 1,'name' => 'users_manager','system_id' => 1],
      ['title' => 'مدیر سازمان  ', 'parent_id' => 2,'name' => 'organizations_manager','system_id' => 1],
      // ['title' => 'مدیر', 'parent_id' => 1,'name' => 3,'system_id' => 1],
      // ['title' => 'کاربر ارشد', 'parent_id' => 1,'name' => 4,'system_id' => 1],
      // ['title' => 'کاربر', 'parent_id' => 1,'name' => 5,'system_id' => 1],
      // ['title' => 'وزارتخانه', 'parent_id' => 2,'name' => 6,'system_id' => 1],
      // ['title' => 'شرکت های مادرتخصصی',  'parent_id' => 2,'name' => 7,'system_id' => 1],
      // ['title' => 'اداره کل', 'parent_id' => 2,'name' => 8,'system_id' => 1],
      // ['title' => 'اداره', 'parent_id' => 2,'name' => 9,'system_id' => 1], 
    ];

    foreach ($roles as $role) {
      Role::create($role);
    }
  }
}
