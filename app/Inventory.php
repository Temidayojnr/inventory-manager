<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date_supplied'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function inStock()
    {
        if ($product_quantiy > 1) {
            return $product_quantity;
        }
    }

    public function available()
    {
        if ($available = 1) {
            return $available;
        }
    }

    public function notAvailable()
    {
        if ($available = 0) {
            return $available;
        }
    }
}
