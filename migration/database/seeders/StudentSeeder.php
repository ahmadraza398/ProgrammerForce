<?php

namespace Database\Seeders\migration\database\seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('student')->insert([
        "name" =>Str::random(20),
        "contact" =>Str::random(15),
        "gid" =>random_int(1,5),
        "cid" =>random_int(1,5),
        "created_at" => now(),
        "updated_at" => now()
    ]);
    }
}
