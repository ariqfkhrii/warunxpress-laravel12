<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'image_url',
        'name',
        'category',
        'description',
        'price',
        'stock',
        'stock_alert_at'
    ];
}
