<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Shiping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = AboutUs::create([
            'text'              =>  " test text "  ,
        ]);


    }
}
