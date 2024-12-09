<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'product_name'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}