<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::create([
            'first_name'       => 'Anas',
            'last_name'        => 'Mohammad',
            'email'            => 'seller@gmail.com',
            'password'         => bcrypt('password'),
            'mobile_number'    => '0987654321',
        ]);
    }
}
