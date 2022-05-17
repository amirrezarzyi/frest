<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['title' => 'نقش های کاربران','name' => 'users',],
            ['title' => 'نقش های سازمانی','name' => 'organizations',], 
            ['title' => 'ایجاد مدیر', 'parent_id' => 1,'name' => 'users_create','system_id' => 1],
            ['title' => 'ایجاد سازمان', 'parent_id' => 2,'name' => 'organizations_create','system_id' => 1],
            // ['name' => 'مشاهده کاربر','parent_id' => 1,'key' => '3'],
            // ['name' => 'حذف کاربر','parent_id' => 1,'key' => '4'], 
            // ['name' => 'ایجاد سازمان','parent_id' => 2,'key' => '5'],
            // ['name' => 'ویرایش سازمان','parent_id' => 2,'key' => '6'],
            // ['name' => 'مشاهده سازمان','parent_id' => 2,'key' => '7'],
            // ['name' => 'حذف سازمان','parent_id' => 2,'key' => '8'], 
        ];
        foreach ($permissions as $user)
        {
            Permission::create($user);
        }
    }
}
