<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Supplier;
use App\Brand;
use Auth;

class InventoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $products = Inventory::count();
        $inventory = Inventory::all();
        $available_product = Inventory::where('status', 1)->count();
        return view('Inventory.dashboard', compact('products', 'inventory', 'available_product'));
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
        $inventory = new Inventory();
        $inventory->product_name = $request->product_name;
        $inventory->brand_id = $request->brand_id;
        $inventory->product_amount = $request->product_amount;
        $inventory->product_quantity = $request->product_quantity;
        $inventory->supplier_id = $request->supplier_id;
        $inventory->added_by = Auth::User()->id;
        $inventory->date_supplied = $request->date_supplied;

        $inventory->save();

        return redirect()->back();
    }

    public function edit_product($id)
    {
        $i = Inventory::find($id);
        $supplier = Supplier::all();
        $brand = Brand::all();

        return view('inventory.edit', compact('i', 'supplier', 'brand'));
    }

    public function updateProduct(Request $request, $id)
    {
        $inventory = Inventory::find($request->id);
        $inventory->product_name = $request->product_name;
        $inventory->brand_id = $request->brand_id;
        $inventory->product_amount = $request->product_amount;
        $inventory->product_quantity = $request->product_quantity;
        $inventory->supplier_id = $request->supplier_id;
        $inventory->added_by = Auth::User()->id;
        $inventory->date_supplied = $request->date_supplied;

        $inventory->save();

        return redirect()->back();
    }

    public function deleteInventory($id)
    {
        $inventory = Inventory::where("id", $id);
        $inventory->delete();
        return redirect()->back();
    }
}
