<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products_adverts';

    protected $guarded = [];

    public function advert(){
        return $this->belongsTo('App\Models\Advert','advert_id');
        
    }
}
