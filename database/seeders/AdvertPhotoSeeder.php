<?php

namespace Database\Seeders;

use App\Models\AdvertPhoto;
use Illuminate\Database\Seeder;

class AdvertPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/112460/pexels-photo-112460.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'advert_id' => '1'
        ]);

        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/112460/pexels-photo-112460.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'advert_id' => '2'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/1090932/pexels-photo-1090932.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'advert_id' => '3'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/1592384/pexels-photo-1592384.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'advert_id' => '4'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/909907/pexels-photo-909907.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'advert_id' => '5'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/909907/pexels-photo-909907.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'advert_id' => '6'
        ]);

        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/1592384/pexels-photo-1592384.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'advert_id' => '11'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/1090932/pexels-photo-1090932.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'advert_id' => '10'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/593172/pexels-photo-593172.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
            'advert_id' => '7'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/909907/pexels-photo-909907.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'advert_id' => '9'
            ]);
    }
}
