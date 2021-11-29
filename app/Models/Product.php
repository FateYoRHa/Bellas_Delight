<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // MENU MODEL
    protected $fillable=[
        'category',
        'productName',
        'productDesc',
        'quantity',
        'productPrice',
        'profile_photo_path'
    ];
}
