<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    use HasFactory;

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'schedule_name',
        'scheduled_date',
        'frequency', // Added frequency field
    ];

    // Define a relationship with the Discrepancy model
    public function discrepancies()
    {
        return $this->hasMany(Discrepancy::class);
    }

    // Define a relationship with the Task model
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Method to generate a report based on discrepancies
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

