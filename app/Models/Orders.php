<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
