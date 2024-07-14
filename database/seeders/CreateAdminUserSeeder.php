<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'              => 'admin',
            'email'             => 'admin@system.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => now() ,
            'created_at'        => now() ,
            'role_id'              => 1
        ]);

   
    }
}
