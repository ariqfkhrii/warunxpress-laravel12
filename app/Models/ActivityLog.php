<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityLogFactory> */
    use HasFactory;

    public $timestamps = [ "created_at" ];

    protected $fillable = [
      'user_id',
      'action',
      'table_name',
      'record_id',
      'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
