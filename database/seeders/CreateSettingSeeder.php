<?php

namespace Database\Seeders;
use App\Models\Setting;
use Illuminate\Database\Seeder;
class CreateSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Setting::create([
            'contact_number'              =>  "0000"  ,
            'adress'                      =>  "adress"  ,
            'gppgle_map_link'              =>  "https://www.google.com/maps"  ,

        ]);


    }
}
