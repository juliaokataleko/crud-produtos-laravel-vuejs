<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GlobalSeeder extends Seeder
{

    public function run()
    {

        $products = [
            'Computador Hp',
            'Caputador portátil',
            'Tablet Samsung',
            'Telemóvel Lenovo',

        ];

        foreach ($products as $key => $name) {
            # code...
            DB::table('products')->insertGetId([
                'name' => $name,
                'price' => 1200,
                'status' => true,
                'created_at' => date("Y-m-d H:i:s")
            ]);
        }
        
    }

}