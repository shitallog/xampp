<?php

namespace App\Imports;
use App\Models\Pincode; // Assuming your Pincode model exists
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Facades\DB;

class PincodeImport implements ToModel, WithHeadingRow
{
    protected $service_id;
    protected $product_id;

    public function __construct($service_id, $product_id)
    {
        $this->service_id = $service_id;
        $this->product_id = $product_id;
    }

    

    public function model(array $row)
    {
        // Log the entire row to check its contents
        Log::info('Importing row:', $row);
    
        return new Pincode([
            'service_id' => $this->service_id,
            'product_id' => $this->product_id,
            'origin_city' => $row['origin_city'],
            'origin_state' => $row['origin_state'],
            'origin_region' => $row['origin_region'],
            'origin_zone' => $row['origin_zone'],
            'dest_pincode' => $row['dest_pincode'],
            'dest_city' => $row['dest_city'],
            'dest_state' => $row['dest_state'],
            'dest_region' => $row['dest_region'],
            'dest_zone' => $row['dest_zone'],
            'product' => $row['product'],
            'dox_line_haul_tat' => $row['dox_line_haul_tat'] ?? 0, // Log before using
            'dox_end_mile_tat' => $row['dox_end_mile_tat'] ?? 0,
            'dox_tat' => $row['dox_tat'] ?? 0,
            'non_dox_line_haul_tat' => $row['non_dox_line_haul_tat'] ?? 0,
            'non_dox_end_mile_tat' => $row['non_dox_end_mile_tat'] ?? 0,
            'non_dox_tat' => $row['non_dox_tat'] ?? 0,
            'cut_off_time' => $row['cut_off_time'] ?? '',
        ]);
    }
    
    
}