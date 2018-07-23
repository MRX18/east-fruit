<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Currency;

class Price extends Model
{
    public function setPriceAttribute($value)
    {
        $price = $this->attributes['price_input'];
        $_controller = new Controller();

        $currencys = $_controller->currency();
        $currency = Currency::where('id', $this->attributes['currency'])->value('charCode');

        $currency = $currencys[$currency][0]/$currencys[$currency][1]; // указаная валюта
        $uan = $currencys["UAH"][0]/$currencys["UAH"][1];


        $p = round(($price*$currency)/$uan, 2);

        return $this->attributes['price'] = $p;
    }

    public function price($market, $product, $specification, $dateMin, $dateMax) {
    	return $this->whereIn('id_market', $market)
                ->where('id_product', $product)
                ->where('id_specification', $specification)
                ->whereBetween('date', [$dateMin, $dateMax])
                ->orderBy('date')
                ->get();
    }

    public function priceN($market, $product, $dateMin, $dateMax) { // без спецыфикации
    	return $this->whereIn('id_market', $market)
                ->where('id_product', $product)
                ->whereBetween('date', [$dateMin, $dateMax])
                ->orderBy('date')
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

    public function SpecificationRelation()
    {
        return $this->belongsTo(Specification::class, 'id_specification', 'id');
    }

    public function CurrencyRelation()
    {
        return $this->belongsTo(Currency::class, 'currency', 'id');
    }

    
}
