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
            ['name' => 'مجوزهای های کاربران'],
            ['name' => 'مجوزهای های سازمانی'], 
            ['name' => 'ایجاد کاربر','parent_id' => 1,'key' => 'users'],
            ['name' => 'ویرایش کاربر','parent_id' => 1,'key' => 'users'],
            ['name' => 'مشاهده کاربر','parent_id' => 1,'key' => 'users'],
            ['name' => 'حذف کاربر','parent_id' => 1,'key' => 'users'], 
            ['name' => 'ایجاد سازمان','parent_id' => 2,'key' => 'organizations'],
            ['name' => 'ویرایش سازمان','parent_id' => 2,'key' => 'organizations'],
            ['name' => 'مشاهده سازمان','parent_id' => 2,'key' => 'organizations'],
            ['name' => 'حذف سازمان','parent_id' => 2,'key' => 'organizations'], 
        ];
        foreach ($permissions as $user)
        {
            Permission::create($user);
        }
    }
}
