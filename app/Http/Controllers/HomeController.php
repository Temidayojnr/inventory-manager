<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Supplier;
use App\Brand;
use App\User;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = Inventory::count();
        $inventory = Inventory::all();
        return view('Inventory.dashboard', compact('products', 'inventory'));
    }

    public function users()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            $user = User::all();
            return view('users.index', compact('user'));
        } else { 
            return view('Inventory.dashboard');
        }
    }

    public function add_user(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_staff = 1;
        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect()->route('Users')->with('success', 'User Created');

    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Store User Deleted Successfully!!');
    }
}
