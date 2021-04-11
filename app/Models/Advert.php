<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
        
    }

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
        
    }

    public function advertStatus(){
        return $this->belongsTo('App\Models\AdvertStatus','advert_status_id');
        
    }

    public function township(){
        return $this->belongsTo('App\Models\Township','Township_id');
        
    }
}
