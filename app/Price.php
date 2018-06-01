<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function price($market, $product, $currency, $specification, $dateMin, $dateMax) {
    	return $this->whereIn('id_market', $market)
                ->where('id_product', $product)
                ->where('currency', $currency)
                ->where('id_specification', $specification)
                ->whereBetween('date',[$dateMin, $dateMax])
                ->get();
    }

    public function priceN($market, $product, $currency, $dateMin, $dateMax) { // без спецыфикации
    	return $this->whereIn('id_market', $market)
                ->where('id_product', $product)
                ->where('currency', $currency)
                ->whereBetween('date',[$dateMin, $dateMax])
                ->get();
    }
}
