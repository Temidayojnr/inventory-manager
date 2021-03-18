<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Supplier;
use App\Brand;
use App\Order;
use App\User;
use Auth;
use DB;

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
        $orders = Order::count();
        $available_product = Inventory::where('status', 1)->count();
        $user = User::all();
        return view('Inventory.dashboard', compact('products', 'inventory', 'orders', 'available_product', 'user'));
    }

    public function chart()
    {
        $result = \DB::table('inventory')
                ->where('product_name','=','Products')
                ->orderBy('created_at', 'ASC')
                ->get();
        return response()->json($result);
    }

    public function products()
    {
        $inventory = Inventory::all();
        return view('Inventory.products', compact('inventory'));
    }

    public function createProductPage()
    {
        $supplier = Supplier::all();
        $brand = Brand::all();
        return view('Inventory.addproduct', compact('supplier', 'brand'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'product_name' => ['string', 'required'],
            'product_quantity' => ['integer', 'required'],
            'date_supplied' => ['date', 'required'],
        ]);

        $inventory = new Inventory();
        $inventory->product_name = $request->product_name;
        $inventory->brand_id = $request->brand_id;
        $inventory->product_amount = $request->product_amount;
        $inventory->product_quantity = $request->product_quantity;
        $inventory->supplier_id = $request->supplier_id;
        $inventory->added_by = Auth::User()->id;
        $inventory->date_supplied = $request->date_supplied;
        $inventory->stock_value = $request->product_quantity * $request->product_amount;

        $inventory->save();

        return redirect()->back()->with('success', 'Product Created Successfully!!');;
    }

    public function edit_product($id)
    {
        $i = Inventory::find($id);
        $supplier = Supplier::all();
        $brand = Brand::all();

        return view('Inventory.edit', compact('i', 'supplier', 'brand'));
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

        return redirect()->back()->with('success', 'Product Updated Successfully!!');;
    }

    public function deleteInventory($id)
    {
        $inventory = Inventory::where("id", $id);
        $inventory->delete();
        return redirect()->back();
    }

    public function InventoryStatus(Request $request)
    {
        $inventory = Inventory::find($request->id);
        $inventory->status = $request->status;
        $inventory->save();
        if ($request->status == 1) {
            return 'Product Marked Available.';
        } else {
            return 'Product Marked Unavailable.';
        }
    }
}
