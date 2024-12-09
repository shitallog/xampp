<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PincodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pincode')->insert([
            'service_id' => 1,
            'product_id' => 1,
            'pincode' => '123456',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}