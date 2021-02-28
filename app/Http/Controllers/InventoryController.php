<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function dashboard()
    {
        return view('Inventory.dashboard');
    }

    public function products()
    {
        $inventory = Inventory::all();
        return view('inventory.products', compact('inventory'));
    }

    public function createProductPage()
    {
        $supplier = Supplier::all();
        $brand = Brand::all();
        return view('inventory.addproduct', compact('supplier', 'brand'));
    }

    public function addProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->quantity = $request->quantity;
        $prodcut->supplier_id = $reuqest->supplier_id;
        $product->added_by = Auth::User()->id;

        $product->save();

        return redirect()->back();
    }
}
