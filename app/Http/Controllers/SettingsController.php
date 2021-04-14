<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Brand;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function supplier()
    {
        $supplier = Supplier::all();
        return view('settings.supplier', compact('supplier'));
    }

    public function add_supplier(Request $request)
    {
        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->save();
        return redirect()->back()->with('success', 'Supplier created Successfully!!');
    }

    public function brand()
    {
        $brand = Brand::all();
        return view('settings.brand', compact('brand'));
    }

    public function add_brand(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->save();
        return redirect()->back()->with('success', 'Brand created Successfully!!');
    }
}
