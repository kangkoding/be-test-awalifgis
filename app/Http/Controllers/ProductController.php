<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $vendor = Auth::user()->vendor;

        if (!$vendor) {
            return response()->json(['message' => 'Vendor not found.'], 404);
        }

        return response()->json($vendor->products, 200);
    }

    public function store(Request $request)
    {
        $vendor = Auth::user()->vendor;

        if (!$vendor) {
            return response()->json(['message' => 'Vendor not found.'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product = $vendor->products()->create($validated);

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => $product
        ], 201);
    }

    public function show(Product $product)
    {
        $this->authorizeProduct($product);

        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|numeric|min:0',
        ]);

        $product->update($validated);

        return response()->json([
            'message' => 'Product updated successfully.',
            'data' => $product
        ]);
    }

    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully.']);
    }

    protected function authorizeProduct(Product $product)
    {
        $vendor = Auth::user()->vendor;

        if (!$vendor || $product->vendor_id !== $vendor->id) {
            abort(403, 'Unauthorized');
        }
    }
}
