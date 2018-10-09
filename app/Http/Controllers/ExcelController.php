<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use AdminSection;

use App\Currency;
use App\Market;
use App\Price;
use App\Product;
use App\Specification;

use Excel;

class ExcelController extends Controller
{
    public function uploadExsel(Request $request) {

        if($request->isMethod('post')) {

            $validator = Validator::make($request->all(),
            [
                'excel' => 'required',
                'markets' => 'required|integer',
                'currencies' => 'required|alpha',
                'date' => 'required|date'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
                $_price = new Price();

                $file = $request->excel;
                $file_name  = $file->getClientOriginalName();
                $file->move('files', $file_name);

                $table = Excel::load('files/'.$file_name, function($reader) {
                    $reader->all();
                })->get();

//                dd($table);

                $currency = $this->currency();
                $currencyID = Currency::where('charCode', $request->currencies)->value('id');
                
                if($request->currencies=='RUB'){
                    $cur=1;
                }else{
                    $cur = $currency[$request->currencies][0]/$currency[$request->currencies][1]; // указаная валюта
                }

                $uan = $currency["UAH"][0]/$currency["UAH"][1]; // гривна

                foreach ($table as $t) {
                    if(
                        (isset($t->min) && $t->min != 0) &&
                        (isset($t->max) && $t->max != 0) &&
                        (isset($t->avg) && $t->avg != 0)
                    ) {
                        $productID = Product::where('name', 'LIKE', $t->product)->value('id');
                       if (empty($t->specification)) {
                           $specificationID=null;
                       }else{
                            $specificationID = Specification::where('title', 'LIKE', $t->specification)->value('id'); 
                       }
                     

                            $priceMin = round(($t->min*$cur)/$uan, 2);
                            $priceMax = round(($t->max*$cur)/$uan, 2);
                            $priceAvg = round(($t->avg*$cur)/$uan, 2);



                        Price::insert([
                            'id_product' => $productID,
                            'id_specification' => $specificationID,
                            'id_market' => $request->markets,
                            'currency' => $currencyID,
                            'date' => $request->date,

                            'price_min' => $priceMin,
                            'price_max' => $priceMax,
                            'price_avg' => $priceAvg,

                            'price_input_min' =>round($t->min,2),
                            'price_input_max' =>round($t->max,2),
                            'price_input_avg' =>round($t->avg,2)
                        ]);
                        
                    }
                }
                 echo '<script type="text/javascript">alert("Цены успешно импортированы")</script>';
            }
        }

        $market = Market::get();
        $currency = Currency::get();

        $data = [
            'market' => $market,
            'currency' => $currency
        ];

//        return view('exsel', $data);
        return AdminSection::view(view('admin.exсel', $data), 'Цены Excel');
    }
}
