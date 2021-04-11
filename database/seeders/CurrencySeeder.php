<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'currency_type'=>'Lempiras'
        ]);

        Currency::create([
            'currency_type'=>'Dolares'
        ]);
    }
}
