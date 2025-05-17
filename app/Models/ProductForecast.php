<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductForecast extends Model
{
    use HasFactory;

    public $timestamps = [ "created_at" ];

    protected $fillable = [
        'product_id',
        'forecast_date',
        'predicted_stock',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
