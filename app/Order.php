<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'user_id', 'transaction_id', 'name', 'quantity', 'price'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function transaction()
    {
      return $this->belongsTo(Transaction::class);
    }
}
