<?php

namespace Database\Factories;

use App\Models\Advert;
use App\Models\Category;
use App\Models\Township;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(),
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
            'cadAdvert'=> 'Gratis',
            'creation_date'=> $this->faker->dateTimeBetween('-5 days','now'),
            'expiration_date'=> $this->faker->dateTimeBetween('+0 days', '+5 week'),
            'user_id'=>$this->faker->numberBetween(1, User::count()),
            'category_id'=> $this->faker->numberBetween(1, Category::count()),
            'advert_status_id'=>1,
            'township_id'=>$this->faker->numberBetween(1, Township::count())
        ];
    }
}
