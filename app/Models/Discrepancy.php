<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discrepancy extends Model
{
    use HasFactory;
    protected $fillable = [
        'stock_opname_id',
        'item_name',
        'system_quantity',
        'physical_quantity',
    ];

    public function stockOpname()
    {
        return $this->belongsTo(StockOpname::class);
    }
}
