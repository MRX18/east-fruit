<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Currency;

class Price extends Model
{
    public function setPriceInputAttribute($price)
    {
        $_controller = new Controller();

        $currencys = $_controller->currency();
        $currency = Currency::where('id', $this->attributes['currency'])->value('charCode');

        $currency = $currencys[$currency][0]/$currencys[$currency][1];
        $uan = $currencys["UAH"][0]/$currencys["UAH"][1];

        $price = explode('-', $price);

        for($i=0; $i<count($price); $i++) { // перевів валюту в гривні
            $price[$i] = round(($price[$i]*$currency)/$uan, 2);
        }

        $price = implode('-', $price);

        return $this->attributes['price'] = $price;
    }

    public function getPriceAttribute($price) {
        $_controller = new Controller();

        $currencys = $_controller->currency();
        $currency = Currency::where('id', $this->attributes['currency'])->value('charCode');

        $currency = $currencys[$currency][0]/$currencys[$currency][1];
        $uan = $currencys["UAH"][0]/$currencys["UAH"][1];

        $price = explode('-', $price);

        for($i=0; $i<count($price); $i++) { // перевів валюту в гривні
            $price[$i] = round(($price[$i]/$currency)*$uan, 2);
        }

        $price = implode('-', $price);

        return $this->attributes['price_input'] = $price;
    }



    public function price($market, $product, $specification, $dateMin, $dateMax) {
    	return $this->whereIn('id_market', $market)
                ->where('id_product', $product)
                ->where('id_specification', $specification)
                ->whereBetween('date', [$dateMin, $dateMax])
                ->get();
    }

    public function priceN($market, $product, $dateMin, $dateMax) { // без спецыфикации
    	return $this->whereIn('id_market', $market)
                ->where('id_product', $product)
                ->whereBetween('date', [$dateMin, $dateMax])
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
