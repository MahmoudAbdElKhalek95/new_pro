<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateTrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = user::where('role_id' , 4 ) ->get() ;

        $role = Role::findByName('trainer');
       // $role->givePermissionTo('course_order-List');


        foreach (  $users as  $user )
        {


            $user->assignRole([$role->id]);


        }
    }
}
