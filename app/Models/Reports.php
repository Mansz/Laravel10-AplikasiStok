<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;
    protected $fillable = [
        'stock_opname_id',
        'report_data',
    ];

    public function stockOpname()
    {
        return $this->belongsTo(StockOpname::class);
    }
    public function generateReport()
    {
        $discrepancies = $this->discrepancies;

        $reportData = [];
        foreach ($discrepancies as $discrepancy) {
            $reportData[] = [
                'item_name' => $discrepancy->item_name,
                'system_quantity' => $discrepancy->system_quantity,
                'physical_quantity' => $discrepancy->physical_quantity,
                'difference' => $discrepancy->physical_quantity - $discrepancy->system_quantity,
                'scheduled_date' => Carbon::parse($this->scheduled_date)
                    ->setTimezone('Asia/Jakarta')
                    ->format('d/m/Y H:i:s'),
            ];
        }

        return $reportData;
    }
}
