<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'showview',
        'category_id',
        'des',
        'short_des', 
        'images',
        'title_go',
        'keyword_go',
        'des_go',
        'slug',
        'views',
        'hot',
    ];
}
