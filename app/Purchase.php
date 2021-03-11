<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchase';

    protected $dates = ['date_supplied'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
