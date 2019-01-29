<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testdb extends Model
{
    protected $fillable = [
        'height', 'weight', 'label',
    ];
}
