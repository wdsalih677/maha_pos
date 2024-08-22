<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $premissions = [
            'لوحة التحكم',

            'إدارة المستخدمين',
            'المستخدمين',

            'قائمة المستخدمين',
            'إضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'صلاحيات المستخدمين',
            'إضافة صلاحيه',
            'تعديل صلاحيه',
            'حذف صلاحيه',
        ];
        foreach( $premissions as $premission ){
            Permission::create(['name' => $premission ]);
        }
    
    }
}
