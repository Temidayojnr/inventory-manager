<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Supplier;
use App\College;
use App\Department;
use App\Order;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        $college = College::all();
        $departments = Department::all();
        $inventory = Inventory::all();
        $orders = Order::all();
        return view('order.index', compact('college', 'departments', 'inventory', 'orders'));
    }

    public function create()
    {
        $college = College::all();
        $departments = Department::all();
        $inventory = Inventory::all();
        $orders = Order::all();
        return view('order.create', compact('college', 'departments', 'inventory', 'orders'));
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
            'quantity' => ['integer', 'required'],
            'requisition_date' => ['date', 'required'],
            'issue_date' => ['date', 'before_or_equal:requisition_date', 'required'], 
        ]);


        $order = new Order;

        $order->college_id = $request->college_id;

        $order->department_id = $request->department_id;

        $order->product_id = $request->product_id;

        $order->quantity = $request->quantity;

        $order->requisition_number = $request->requisition_number;

        $order->requisition_date = $request->requisition_date;

        $order->unit_price = $request->unit_price;

        $order->issue_date = $request->issue_date;

        $order->invoice_id = $request->invoice_id;

        $order->total_cost = $request->quantity * $request->unit_price;

        $order->created_by = Auth::user()->id;

        $order->save();

        // foreach( $productDetails as $pro) {
        //     ProductsAttribute::where('product_id',  $pro->product_id)->decrement('Inventory', $pro->quantity);
        // }
        // DB::table('Inventory')->where('product_name', $request->input('product_name'))->decrement('product_quantity', $request->product_quantity);

        return redirect()->back()->with('success', 'Order created Successfully!!');;
    }


    public function softDeleteOrder($id)
    {
        $order = Order::find($id);

        $order->isDeleted = 1;

        $order->deleted_by = Auth::user()->id;

        $order->update();

        return redirect()->route('Orders')->with('success', 'Order Removed successfully');
    }
}
