<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Ramsey\Uuid\Type\Integer;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 20; $i++) {
            DB::table('products')->insert([
                "ptitle" =>Str::random(20),
                "pdescription" => Str::random(100),
                "pimage" =>Str::random(6) . '.jpg',
                "pprice" =>rand(100,5000),
                "cid" => rand(1,3),
            ]);
           }
    }
}
