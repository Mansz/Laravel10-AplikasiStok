<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_id',
        'stock_opname_id',
        'task_name',
        'area',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function stockOpname()
    {
        return $this->belongsTo(StockOpname::class);
    }
}
