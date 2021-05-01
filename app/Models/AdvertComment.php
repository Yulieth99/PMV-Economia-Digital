<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertComment extends Model
{
    use HasFactory;
    protected $table = "adverts_comments";
    protected $fillable = [
        'commentary', 'creation_date','user_id', 'advert_id', 'parent_id'
    ];
}
