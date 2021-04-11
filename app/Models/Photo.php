<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'adverts_photos';
    protected $fillable = ['url1'];

    use HasFactory;

    public function photo(){
        return $this->belongsTo('App\Models\Advert','advert_id');
        
    }
}
