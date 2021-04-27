<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Brand;
use App\User;

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

    public function profile($id)
    {
        $u = User::find($id);
        return view('settings.profile', compact('u'));
    }

    public function update_profile(Request $request, $id)
    {
        $u = User::find($request->id);
        $u->name = $request->name;
        $u->email = $request->email;
        $u->phone_number = $request->phone_number;

        if($request->hasFile('profile_image')){
            $image_file = $request->file('profile_image');
            $ext = $image_file->getClientOriginalExtension();
            $image = 'logo _' . time() . '.' . $ext;
            $image_file->storeAs('public/images/', $image);

            $u->profile_image = $image;
        }

        // dd($request->all());

        $u->save();

        return redirect()->back()->with('success', 'Profile Info Updated successfully');
    }
}
