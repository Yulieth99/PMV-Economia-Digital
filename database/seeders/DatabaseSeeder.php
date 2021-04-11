<?php

namespace Database\Seeders;

use App\Models\Advert;
use App\Models\AdvertStatus;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\UserType;
use GuzzleHttp\Promise\Create;
use App\Models\AdvertComment;

use App\Models\AdvertPhoto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name' => 'Test',
            'email' => 'test@test.com',
            'gender'=>'masculino',
            'birthdate'=>'2000-12-12',
            'address'=>'direccion del usuario',
            'number'=>'18007878',
            'condition'=>1,
            'email_verified_at' => now(),
            'password' => '$2y$10$rq5oCT9eD1szjfUsTn5E8uJWCMCvFRjUsrq85t/pz1Qy9CRxoDADu', // password asd.123456
        ]);

        User::factory(20)->create();
        $this->call(CategorySeeder::class);
        $this->call(DepartamentSeeder::class);
        $this->call(TownshipSeeder::class);
        Advert::factory(90)->create();
        $this->call(CurrencySeeder::class);
        Product::factory(90)->create();
        $this->call(AdvertPhotoSeeder::class);

        

    }
}
