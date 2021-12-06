<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    // MENU MODEL
    protected $fillable=[
        'category',
        'productName',
        'productDesc',
        'quantity',
        'productPrice',
        'profile_photo_path'
    ];

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('productName', 'like', $term)
            ->orWhere('category', 'like', $term);
        });
    }
}
