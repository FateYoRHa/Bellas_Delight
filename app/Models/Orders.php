<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_number',
        'user_id',
        'status',
        'grand_total',
        'item_count',
        'payment_status',
        'payment_method',
        'first_name',
        'last_name',
        'address',
        'email',
        'phone_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
