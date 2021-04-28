<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Supplier;
use App\Brand;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchase = Purchase::all();
        $supplier = Supplier::all();
        $brand = Brand::all();

        return view('purchase.index', compact('purchase', 'supplier', 'brand'));
    }

    public function create()
    {
        $purchases = Purchase::all();
        $supplier = Supplier::all();
        $brand = Brand::all();

        return view('purchase.create', compact('purchases', 'supplier', 'brand'));
    }

    public function purchase(Request $request)
    {
        $request->validate([
            'product_name' => ['required'],
            'supplier_id' => ['required'],
            'brand_id' => ['required'],
            'brand_id' => ['required'],
            'quantity' => ['integer', 'required'],
            'date_supplied' => ['date', 'required'],
            'unit_price' => ['required'],
            'supplier_email' => ['required'],
            'phone_number' => ['required'],
            'invoice_id' => ['required'],
        ]);


        $purchase = new Purchase;

        $purchase->product_name = $request->product_name;

        $purchase->supplier_id = $request->supplier_id;

        $purchase->brand_id = $request->brand_id;

        $purchase->supplier_email = $request->supplier_email;

        $purchase->quantity = $request->quantity;

        $purchase->date_supplied = $request->date_supplied;

        $purchase->unit_price = $request->unit_price;

        $purchase->phone_number = $request->phone_number;

        $purchase->total_amount = $request->quantity * $request->unit_price;

        $purchase->invoice_id = $request->invoice_id;

        $purchase->save();

        return redirect()->back()->with('success', 'Purchase created Successfully!!');
    }

    public function edit_purchase($id)
    {
        $purchase = Purchase::find($id);
        $supplier = Supplier::all();
        $brand = Brand::all();

        return view('purchase.edit', compact('purchase', 'supplier', 'brand'));
    }

    public function update_purchase(Request $request, $id)
    {
        $purchase = Purchase::find($request->id);

        $purchase->product_name = $request->product_name;

        $purchase->supplier_id = $request->supplier_id;

        $purchase->brand_id = $request->brand_id;

        $purchase->supplier_email = $request->supplier_email;

        $purchase->quantity = $request->quantity;

        $purchase->date_supplied = $request->date_supplied;

        $purchase->unit_price = $request->unit_price;

        $purchase->phone_number = $request->phone_number;

        $purchase->total_amount = $request->quantity * $request->unit_price;

        $purchase->invoice_id = $request->invoice_id;

        $purchase->save();

        return redirect()->back()->with('success', 'Purchase Updated Successfully!!');
    }

    public function delete_purchase($id)
    {
        $purchase = Purchase::where("id", $id);
        $purchase->delete();
        return redirect()->back();
    }
}
