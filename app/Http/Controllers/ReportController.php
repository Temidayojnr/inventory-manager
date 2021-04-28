<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Purchase;
use App\Order;
use DB;

class ReportController extends Controller
{
    public function index()
    {
     return view('reports.index');
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
        if($request->from_date != '' && $request->to_date != '')
        {
        $data = DB::table('Inventory')
            ->whereBetween('date_supplied', array($request->from_date, $request->to_date))
            ->get();
        }
        else
        {
            $data = DB::table('Inventory')->orderBy('date_supplied', 'desc')->get();
        }
            return json_encode($data);
        }
    }

    public function purchase()
    {
        return view('reports.purchase');
    }

    public function fetch_purchase(Request $request)
    {
        if($request->ajax())
        {
            if($request->from_date != '' && $request->to_date != '')
            {
                // dd($request->from_date, $request->to_date);
                $data = Purchase::whereBetween('date_supplied', array($request->from_date, $request->to_date))
                // ->orWhere('date_supplied', '<=', $request->to_date)
                    ->with('brand')
                    ->with('supplier')
                    ->get();
            }
            else
            {
                $data = Purchase::orderBy('date_supplied', 'desc')
                ->with('brand')
                ->with('supplier')
                ->get();
            }
            return json_encode($data);
        }
    }

    public function order()
    {
        return view('reports.order');
    }

    public function fetch_order(Request $request)
    {
        if($request->ajax())
        {
        if($request->from_date != '' && $request->to_date != '')
        {
            $data = Order::where('issue_date', '<=', $request->from_date)
            ->orWhere('issue_date', '>=', $request->to_date)
                ->with('product')
                ->with('department')
                ->with('college')
                ->with('price')
                ->get();
        }
        else
        {
            $data = Order::orderBy('issue_date', 'desc')
            ->with('product')
            ->with('department')
            ->with('college')
            ->with('price')
            ->get();
        }
            return json_encode($data);
        }
    }
}
