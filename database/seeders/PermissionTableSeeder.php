<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Update Permission Table Settings
        $permissions = [
            [
                'en' => 'Roles-List',
                'ar' => 'قائمة الصلاحيات',
            ],
            [
                'en' => 'Roles-Create',
                'ar' => 'إنشاء صلاحية',
            ],
            [
                'en' => 'Roles-Edit',
                'ar' => 'تعديل صلاحية',
            ],
            [
                'en' => 'Roles-Delete',
                'ar' => 'حذف صلاحية',
            ],
          
            [
                'en' => 'Projects-List',
                'ar' => 'قائمة الصلاحيات',
            ],
            [
                'en' => 'Projects-Create',
                'ar' => 'إنشاء صلاحية',
            ],
            [
                'en' => 'Projects-Edit',
                'ar' => 'تعديل صلاحية',
            ],
            [
                'en' => 'Projects-Delete',
                'ar' => 'حذف صلاحية',
            ],
         
            [
                'en' => 'Partiners-List',
                'ar' => 'قائمة الصلاحيات',
            ],
            [
                'en' => 'Partiners-Create',
                'ar' => 'إنشاء صلاحية',
            ],
            [
                'en' => 'Partiners-Edit',
                'ar' => 'تعديل صلاحية',
            ],
            [
                'en' => 'Partiners-Delete',
                'ar' => 'حذف صلاحية',
            ],

            [
                'en' => 'Contact-List',
                'ar' => 'قائمة الصلاحيات',
            ],
            [
                'en' => 'Contact-Create',
                'ar' => 'إنشاء صلاحية',
            ],
            [
                'en' => 'Contact-Edit',
                'ar' => 'تعديل صلاحية',
            ],
            [
                'en' => 'Contact-Delete',
                'ar' => 'حذف صلاحية',
            ],
         
         
            [
                'en' => 'Adress-List',
                'ar' => 'قائمة الصلاحيات',
            ],
            [
                'en' => 'Adress-Create',
                'ar' => 'إنشاء صلاحية',
            ],
            [
                'en' => 'Adress-Edit',
                'ar' => 'تعديل صلاحية',
            ],
            [
                'en' => 'Adress-Delete',
                'ar' => 'حذف صلاحية',
            ],
    

            [
                'en' => 'slider-List',
                'ar' => 'قائمة السليدر',
            ],
            [
                'en' => 'slider-Create',
                'ar' => 'إنشاء السليدر',
            ],
            [
                'en' => 'slider-Edit',
                'ar' => 'تعديل السليدر',
            ],
            [
                'en' => 'slider-Delete',
                'ar' => 'حذف السليدر',
            ],

            [
                'en' => 'news-List',
                'ar' => 'قائمة الاخبار',
            ],
            [
                'en' => 'news-Create',
                'ar' => 'إنشاء الاخبار',
            ],
            [
                'en' => 'news-Edit',
                'ar' => 'تعديل الاخبار',
            ],
            [
                'en' => 'news-Delete',
                'ar' => 'حذف الاخبار',
            ],

         

            [
                'en' => 'about-List',
                'ar' => 'قائمة من نحن',
            ],
            [
                'en' => 'about-Create',
                'ar' => 'إنشاء من نحن',
            ],
            [
                'en' => 'about-Edit',
                'ar' => 'تعديل من نحن',
            ],
            [
                'en' => 'about-Delete',
                'ar' => 'حذف من نحن',
            ],


            [
                'en' => 'users-List',
                'ar' => 'قائمة المستخدمين',
            ],
        




         ];

        foreach ($permissions as $key => $value) {

           // Permission::create(['name' => $permission]);
            Permission::updateOrCreate([
                'name' => $value['en'],

            ],
            [
                'ar_name' => $value['ar'],
                'guard_name' => 'web' ,
            ]
            );
        }
    }
}
