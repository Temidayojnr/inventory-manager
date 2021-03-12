<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    protected $table = 'orders';

    protected $casts = [
        'issue_date' => 'date',
        'requisition_date' => 'date',
    ];

    public function product()
    {
        return $this->belongsTo(Inventory::class, 'product_id');
    }

    public function totat_cost(Request $request)
    {
        $total_cost = $order->quantity * $order->unit_price;
        return $total_cost;
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

    public function who_deleted()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
