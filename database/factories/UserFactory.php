<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Township;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->randomElement(['femenino', 'masculino']),
            'birthdate' => $this->faker->date(),
            'address' => 'SomePlaceInThisPlanet',
            'township' => $this->faker->numberBetween(1,10 )     ,

            'number'=> '98230211',
            'email' => $this->faker->unique()->safeEmail,
            'gender'=>$this->faker->randomElement(['masculino','femenino']),
            'birthdate'=>$this->faker->date($format='Y-m-d',$max='2000-12-12'),
            'address'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis, molestiae',
            'number'=>$this->faker->phoneNumber,
            'condition'=>1,
            'email_verified_at' => now(),
            'password' => '$2y$10$rq5oCT9eD1szjfUsTn5E8uJWCMCvFRjUsrq85t/pz1Qy9CRxoDADu', // password asd.123456
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
