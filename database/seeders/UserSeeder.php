<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
              'username' => 'admin',
              'first_name' => 'مدیر',
              'last_name' => 'سیستم', 
              'email'=>'admin@gmail.com', 
              'mobile'=>'09123456789', 
              'address'=>'خراسان جنوبی - بیرجند', 
              'avatar'=>'http://sepehr-ict.ir/wp-content/uploads/2021/10/Pic.png', 
              'status'=> 1, 
              'email_verified_at'=>now(),
              'password' => Hash::make('adminadmin')  
            ],
        ];
        
        foreach ($users as $user)
        {
            User::create($user);
        }

        
    }
}
