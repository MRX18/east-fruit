<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function price($market, $product, $specification) {
    	return $this->whereIn('id_market', $market)
                ->where('id_product', $product)
                ->where('id_specification', $specification)
                ->get();
    }

    public function priceN($market, $product) { // без спецыфикации
    	return $this->whereIn('id_market', $market)
                ->where('id_product', $product)
                ->get();
    }

    public function MarketRelation() 
    {
        return $this->belongsTo(Market::class, 'id_market', 'id');
    }

    public function ProductRelation() 
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    
}
