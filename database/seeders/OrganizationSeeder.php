<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orgs = [
            [
               'title' => 'بانک ملی ایران', 
               'national_code' => rand(111111,999999),
               'manager_id' => 1,
               'logo' => 'https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_170,w_170,f_auto,b_white,q_auto:eco,dpr_1/v1488900775/hkx40wm1lkzzqy35kptv.png' 
            ],
            [
               'title' => 'اداره مدیریت شعب خراسان جنوبی',
               'parent_id' =>  1,
               'manager_id' => 1,
               'national_code' => rand(111111,999999),
               'logo' => 'https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_170,w_170,f_auto,b_white,q_auto:eco,dpr_1/v1488900775/hkx40wm1lkzzqy35kptv.png' 
            ],
            [
               'title' => 'واحد فناوری اطلاعات',
               'parent_id' =>  2,
               'manager_id' =>  1,
               'national_code' => rand(111111,999999),
               'logo' => 'https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_170,w_170,f_auto,b_white,q_auto:eco,dpr_1/v1488900775/hkx40wm1lkzzqy35kptv.png' 
            ],
        ];

        foreach ($orgs as $org) {
            Organization::create($org);
        }
    }
}
