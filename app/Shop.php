<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'image', 'category', 'description', 'price', 'release', 'code', 'reposition'];
}
