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
      ['name' => 'نقش های کاربران',],
      ['name' => 'نقش های سازمانی'],
      ['name' => 'نقش های بایگانی'],
      ['name' => 'مدیر کل', 'parent_id' => 1,'key' => 'users','system_id' => 1],
      ['name' => 'مدیر میانی', 'parent_id' => 1,'key' => 'users','system_id' => 1],
      ['name' => 'مدیر', 'parent_id' => 1,'key' => 'users','system_id' => 1],
      ['name' => 'کاربر ارشد', 'parent_id' => 1,'key' => 'users','system_id' => 1],
      ['name' => 'کاربر', 'parent_id' => 1,'key' => 'users','system_id' => 1],
      ['name' => 'وزارتخانه', 'parent_id' => 2,'key' => 'organizations','system_id' => 1],
      ['name' => 'شرکت های مادرتخصصی',  'parent_id' => 2,'key' => 'organizations','system_id' => 1],
      ['name' => 'اداره کل', 'parent_id' => 2,'key' => 'organizations','system_id' => 1],
      ['name' => 'اداره', 'parent_id' => 2,'key' => 'organizations','system_id' => 1],
      ['name' => 'مدیر بایگانی', 'parent_id' => 3,'key' => 'archive','system_id' => 1],
      ['name' => 'معاون بایگانی', 'parent_id' => 3,'key' => 'archive','system_id' => 1],
      ['name' => 'کارمند بایگانی', 'parent_id' => 3,'key' => 'archive','system_id' => 1],
    ];

    foreach ($roles as $role) {
      Role::create($role);
    }
  }
}
