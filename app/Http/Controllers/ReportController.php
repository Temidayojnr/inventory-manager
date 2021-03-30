<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Purchase;
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
        $data = Purchase::where('date_supplied', '>=', $request->from_date)
        ->orWhere('date_supplied', '<=', $request->to_date)
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

    // public function get_custom_posts()
    // {
    //     $postsQuery = Inventory::query();

    //     $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
    //     $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');

    //     if($start_date && $end_date){

    //      $start_date = date('Y-m-d', strtotime($start_date));
    //      $end_date = date('Y-m-d', strtotime($end_date));

    //      $postsQuery->whereRaw("date(inventory.created_at) >= '" . $start_date . "' AND date(inventory.created_at) <= '" . $end_date . "'");
    //     }
    //     $posts = $postsQuery->select('*');
    //     return datatables()->of($posts)
    //         ->make(true);
    // }
}
