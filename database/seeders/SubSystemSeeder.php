<?php

namespace Database\Seeders;

use App\Models\SubSystem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subSystems = [
        ['name' => 'membership'],
        ['name' => 'archive'],
        ];

        foreach($subSystems as $subSystem)
        {
            SubSystem::create($subSystem);
        }
    }
}
