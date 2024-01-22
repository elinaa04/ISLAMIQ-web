<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
// class UserFactory extends Factory
// {
//     protected static ?string $password;

//     /** 
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         $gender = ['laki-laki', 'perempuan'];
//         $rand_gender = array_rand($gender);

//         $input = ['guru', 'siswa', 'kepsek'];
//         $rand_keys = array_rand($input);

//         return [
//             'ni' => rand(11, 100),
//             'password' => \Hash::make('password'),
//             'namaLengkap' => $this->faker->name(),
//             'jenisKelamin' => $gender[$rand_gender],
//             'tanggalLahir' => '2004-08-04',
//             'role' => $input[$rand_keys],
//         ];
//     }

//     /**
//      * Indicate that the model's email address should be unverified.
//      */
//     public function unverified(): static
//     {
//         return $this->state(fn (array $attributes) => [
//             'email_verified_at' => null,
//         ]);
//     }
// }
