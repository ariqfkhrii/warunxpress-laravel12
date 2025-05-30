<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    use HasFactory;

    public $timestamps = [ "created_at" ];

    protected $fillable = [
        'month',
        'income',
        'expense',
        'created_at'
    ];
}
