<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discrepancy;
use App\Models\StockOpname;
class DiscrepancyController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'stock_opname_id' => 'nullable|exists:stock_opnames,id', // Ensure stock_opname_id exists in stock_opnames table
            'item_name' => 'required|string',
            'system_quantity' => 'required|integer',
            'physical_quantity' => 'required|integer',
        ]);

        // Calculate the difference
        $difference = $validatedData['system_quantity'] - $validatedData['physical_quantity'];

        // Create a new Discrepancy record
        Discrepancy::create([
            'stock_opname_id' => $validatedData['stock_opname_id'] ?? null, // Set it as null if not provided
            'item_name' => $validatedData['item_name'],
            'system_quantity' => $validatedData['system_quantity'],
            'physical_quantity' => $validatedData['physical_quantity'],
            'difference' => $difference,
        ]);

        return redirect()->back()->with('success', 'Discrepancy recorded successfully!');
    }
}
