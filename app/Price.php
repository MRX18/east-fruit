<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function price($market, $product, $specification, $dateMin, $dateMax) {
    	return $this->whereIn('id_market', $market)
                ->where('id_product', $product)
                ->where('id_specification', $specification)
                ->whereBetween('date',[$dateMin, $dateMax])
                ->get();
    }

    public function priceN($market, $product, $dateMin, $dateMax) { // без спецыфикации
    	return $this->whereIn('id_market', $market)
                ->where('id_product', $product)
                ->whereBetween('date',[$dateMin, $dateMax])
                ->get();
    }

    
}
