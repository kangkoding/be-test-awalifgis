<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Cek apakah user sudah punya vendor
        if (Auth::user()->vendor) {
            return response()->json([
                'message' => 'You already have a vendor registered.'
            ], 400);
        }

        $vendor = Vendor::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Vendor created successfully.',
            'data' => $vendor
        ], 201);
    }
}
