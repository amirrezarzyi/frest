<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach ((range(1, 20)) as $index) {
            $post = User::create([
                'username' => "06" . rand(111111111,999999999),
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'mobile' => 0 . rand(9150000000,9159999999),
                'status' => 1,
                'avatar' => 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/'.rand(1,1000).'.jpg',
                'email' => $faker->unique()->safeEmail(),
                'organization_id' => Organization::inRandomOrder()->first()->id,  
                'email_verified_at' => now(),
                'password' => '$2y$10$RFOsxDuhkPA4nX7S8zVUmezu9zWhGCa4e9Ggrmwb/V7/L4bCPHq2e', // adminadmin
                'remember_token' => Str::random(10),
            ]); 
        }
        
        foreach ((range(1, 20)) as $index) {
            
            $rand = rand(0, 1);
            DB::table('model_has_roles')->insert(
                [
                    'role_id' => Role::inRandomOrder()->first()->id,  
                    'model_id' => $rand == 1 ? User::inRandomOrder()->first()->id : Organization::inRandomOrder()->first()->id,
                    'model_type' =>  $rand == 1 ? 'App\Models\Organization' : 'App\Models\User'
                ]
            );
        }
    }
}
