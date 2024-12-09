<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pincode extends Model
{
    

    use HasFactory;

    // Define the table name (if it doesn't follow Laravel's pluralization convention)
    protected $table = 'pincode';

    // Define the fillable attributes (columns that can be mass-assigned)
    protected $fillable = [
        'service_id', 'product_id', 'origin_city', 'origin_state', 'origin_region', 
        'origin_zone', 'dest_pincode', 'dest_city', 'dest_state', 'dest_region', 
        'dest_zone', 'product', 'dox_line_haul_tat', 'dox_end_mile_tat', 'dox_tat', 
        'non_dox_line_haul_tat', 'non_dox_end_mile_tat', 'non_dox_tat', 'cut_off_time'
    ];

    // Define the relationships
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}