<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
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
            return response()->json($data);
        }
    }
}
