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

        // $order->total_cost = Order::total_cost($request);
        $order->total_cost = $order->quantity * $order->unit_price;

        $order->created_by = Auth::user()->id;

        $order->save();

        return redirect()->back();
    }
}
