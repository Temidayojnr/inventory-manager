<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';

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
