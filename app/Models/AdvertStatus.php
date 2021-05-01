<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertStatus extends Model
{
    use HasFactory;

    protected $table = 'adverts_statuses';

    protected $guarded = [];

    //relacion de muchos a uno

    public function advert(){
        return $this->hasMany(advert::class);
    }
}
