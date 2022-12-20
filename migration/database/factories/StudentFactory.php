<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" =>Str::random(20),
            "phone" =>Str::random(15),
            "gid" =>rand(1,3),
            "cid" =>rand(1,3),
            "created_at" => now(),
            "updated_at" => now()
        ];
    }
}
