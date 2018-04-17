<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function price($market, $product, $dateMin, $dateMax) {
    	return $this->where('id_market', $market)
                ->where('id_product', $product)
                ->whereBetween('date',[$dateMin, $dateMax]);
    }
}
