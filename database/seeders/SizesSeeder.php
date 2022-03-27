<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            'Small',
            'Medium',
            'Large',
            'Extra Large',
        ];

        foreach ($sizes as $size) {
            Size::create(['size_name' => $size]);
        }
    }
}
