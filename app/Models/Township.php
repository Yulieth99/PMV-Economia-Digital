<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    use HasFactory;

    protected $table = 'townshipes';

    protected $guarded = [];

    public function departament(){
        return $this->hasMany('App\Models\Departament');
    }
}
