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
      ['name' => 'مدیر کل', 'parent_id' => 1,'key' => 1,'system_id' => 1],
      ['name' => 'مدیر میانی', 'parent_id' => 1,'key' => 2,'system_id' => 1],
      ['name' => 'مدیر', 'parent_id' => 1,'key' => 3,'system_id' => 1],
      ['name' => 'کاربر ارشد', 'parent_id' => 1,'key' => 4,'system_id' => 1],
      ['name' => 'کاربر', 'parent_id' => 1,'key' => 5,'system_id' => 1],
      ['name' => 'وزارتخانه', 'parent_id' => 2,'key' => 6,'system_id' => 1],
      ['name' => 'شرکت های مادرتخصصی',  'parent_id' => 2,'key' => 7,'system_id' => 1],
      ['name' => 'اداره کل', 'parent_id' => 2,'key' => 8,'system_id' => 1],
      ['name' => 'اداره', 'parent_id' => 2,'key' => 9,'system_id' => 1],
      ['name' => 'مدیر بایگانی', 'parent_id' => 3,'key' => 10,'system_id' => 1],
      ['name' => 'معاون بایگانی', 'parent_id' => 3,'key' => 11,'system_id' => 1],
      ['name' => 'کارمند بایگانی', 'parent_id' => 3,'key' => 12,'system_id' => 1],
    ];

    foreach ($roles as $role) {
      Role::create($role);
    }
  }
}
