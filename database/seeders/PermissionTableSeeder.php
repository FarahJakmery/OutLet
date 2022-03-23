<?php

namespace Database\Seeders;

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
        $permissions = [

            // Brand Permissions
            'العلامات التجارية',
            'قائمة العلامات التجارية',
            'إضافة العلامة التجارية',
            'تعديل العلامة التجارية',
            'حذف العلامة التجارية',

            // Categories
            'التصنيفات',

            // Main-Category Permissions
            'قائمة التصنيفات الرئيسية',
            'إضافة تصنيف رئيسي',
            'تعديل تصنيف رئيسي',
            'حذف تصنيف رئيسي',

            // Sub-Category Permissions
            'قائمة التصنيفات الثانوية',
            'إنشاء تصنيف ثانوي',
            'تعديل تصنيف ثانوي',
            'حذف تصنيف ثانوي',

            // Branch Permissions
            'قائمة الفروع',
            'إضافة فرع',
            'تعديل فرع',
            'حذف فرع',

            // Role Permissions
            'صلاحيات المستخدمين',
            'عرض صلاحيات الدور',
            'إضافة دور',
            'تعديل الدور',
            'حذف الدور',

            // User Permissions
            'المستخدمين',
            'قائمة المستخدمين',
            'إضافة مستخدم',
            'تعديل المستخدم',
            'عرض المستخدم',
            'حذف المستخدم',

            // The shop Permissions
            'المتجر',

            // Product Permissions
            'قائمة المنتجات',
            'إضافة منتج',
            'تعديل منتج',
            'حذف منتج',

            // Size Permissions
            'قائمة القياسات',
            'إضافة قياس',
            'تعديل القياس',
            'حذف القياس',

            // Color Permissions
            'قائمة الألوان',
            'إضافة لون',
            'تعديل اللون',
            'حذف اللون',

        ];

        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
