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
            'photo_path'=>'https://th.bing.com/th/id/Rbdc9f36a0246590eba146b6ed70254b1?rik=B1amYzdwSwxpAQ&pid=ImgRaw',
            'advert_id' => '1'
        ]);

        AdvertPhoto::create([
            'photo_path'=>'https://th.bing.com/th/id/Rbdc9f36a0246590eba146b6ed70254b1?rik=B1amYzdwSwxpAQ&pid=ImgRaw',
            'advert_id' => '2'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://i2.wp.com/www.elrincondelingeniero.com/wp-content/uploads/2018/06/portada___201412011309.jpg',
            'advert_id' => '3'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://th.bing.com/th/id/OIP.H_OiEFWHLVPM82B5xBmM3AHaJA?pid=ImgDet&w=1024&h=1245&rs=1',
            'advert_id' => '4'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://th.bing.com/th/id/R8c06a8c86b964f1271f3d17bf86cdadf?rik=4f5vNyQvXrmbLA&pid=ImgRaw',
            'advert_id' => '5'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://th.bing.com/th/id/OIP._jRnYbKN5p7BA3dJmZ3lzgHaLG?pid=ImgDet&w=735&h=1102&rs=1    ',
            'advert_id' => '6'
        ]);

        AdvertPhoto::create([
            'photo_path'=>'https://i.pinimg.com/originals/7e/de/9e/7ede9ea3c93d81a6b05b2d84c23c1e76.jpg',
            'advert_id' => '11'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://th.bing.com/th/id/R3d96857e8437a561b9a961c2aa93f8b3?rik=I%2f8ZPet9Wi7qmg&pid=ImgRaw',
            'advert_id' => '10'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://images.pexels.com/photos/593172/pexels-photo-593172.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
            'advert_id' => '7'
        ]);
        AdvertPhoto::create([
            'photo_path'=>'https://th.bing.com/th/id/OIP._jRnYbKN5p7BA3dJmZ3lzgHaLG?pid=ImgDet&w=735&h=1102&rs=1    ',
            'advert_id' => '9'
            ]);

    }
}
