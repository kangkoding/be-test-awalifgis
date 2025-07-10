<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserVendorProductSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Vendor Test',
            'email' => 'vendor@example.com',
            'password' => Hash::make('password'),
            'role' => 'vendor',
        ]);

        $vendor = Vendor::create([
            'user_id' => $user->id,
            'name' => 'Vendor ABC',
        ]);

        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'vendor_id' => $vendor->id,
                'name' => "Produk Dummy $i",
                'description' => "Deskripsi produk ke-$i",
                'price' => rand(10000, 50000),
            ]);
        }
    }
}
