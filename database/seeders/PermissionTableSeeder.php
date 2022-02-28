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
            'Brand-list',
            'Brand-create',
            'Brand-edit',
            'Brand-delete',

            // Main-Category Permissions
            'Main-Category-list',
            'Main-Category-create',
            'Main-Category-edit',
            'Main-Category-delete',

            // Sub-Category Permissions
            'Sub-Category-list',
            'Sub-Category-create',
            'Sub-Category-edit',
            'Sub-Category-delete',

            // Branch Permissions
            'Branch-list',
            'Branch-create',
            'Branch-edit',
            'Branch-delete',

            // Role Permissions
            'Role-list',
            'Role-create',
            'Role-edit',
            'Role-delete',

            // User Permissions
            'User-list',
            'User-create',
            'User-edit',
            'User-delete',

            // Product Permissions
            'Product-list',
            'Product-create',
            'Product-edit',
            'Product-delete',
        ];

        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
