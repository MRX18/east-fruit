<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Currency;

class Price extends Model
{
    public function setPriceMinAttribute($value)
    {
        $price = $this->attributes['price_input_min'];
        $_controller = new Controller();

        $currencys = $_controller->currency();
        $currency = Currency::where('id', $this->attributes['currency'])->value('charCode');

        $uan = $currencys["UAH"][0]/$currencys["UAH"][1];

        if($currency=='RUB'){
            $p = round($price/$uan, 2);  
        }else{
            $currency = $currencys[$currency][0]/$currencys[$currency][1]; // указаная валюта
           $p = round(($price*$currency)/$uan, 2);   
        }

        return $this->attributes['price_min'] = $p;
    }

    public function setPriceAvgAttribute($value)
    {
        $price = $this->attributes['price_input_avg'];
        $_controller = new Controller();

        $currencys = $_controller->currency();
        $currency = Currency::where('id', $this->attributes['currency'])->value('charCode');

        $uan = $currencys["UAH"][0]/$currencys["UAH"][1];

        if($currency=='RUB'){
            $p = round($price/$uan, 2);  
        }else{
            $currency = $currencys[$currency][0]/$currencys[$currency][1]; // указаная валюта
           $p = round(($price*$currency)/$uan, 2);   
        }

        return $this->attributes['price_avg'] = $p;
    }

    public function setPriceMaxAttribute($value)
    {
        $price = $this->attributes['price_input_max'];
        $_controller = new Controller();

        $currencys = $_controller->currency();
        $currency = Currency::where('id', $this->attributes['currency'])->value('charCode');

        $uan = $currencys["UAH"][0]/$currencys["UAH"][1];

        if($currency=='RUB'){
            $p = round($price/$uan, 2);  
        }else{
            $currency = $currencys[$currency][0]/$currencys[$currency][1]; // указаная валюта
           $p = round(($price*$currency)/$uan, 2);   
        }

        return $this->attributes['price_max'] = $p;
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

    public function Market()
    {
        return $this->belongsTo(Market::class, 'id_market', 'id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    public function Specification()
    {
        return $this->belongsTo(Specification::class, 'id_specification', 'id');
    }

    public function Currency()
    {
        return $this->belongsTo(Currency::class, 'currency', 'id');
    }

    
}
