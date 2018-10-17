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
    public $data;
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

    public function exportExcel(Request $request) {
        $market = explode(',', $_GET['market']);

        $_price = new Price();

        if(isset($_GET['specification'])) {
            $prices = $_price->price($market, $_GET['product'], $_GET['specification'], $_GET['dateMin'], $_GET['dateMax']);
        } else {
            $prices = $_price->priceN($market, $_GET['product'], $_GET['dateMin'], $_GET['dateMax']);
        }

        if($request->price == 1) {
            foreach ($prices as $price) {
                $price->price = $price->price_min;
                $price->price_input = $price->price_input_min;
                $price->currencyl=$price->currency;
            }
        } elseif($request->price == 2) {
            foreach ($prices as $price) {
                $price->price = $price->price_max;
                $price->price_input = $price->price_input_max;
                $price->currencyl=$price->currency;
            }
        } elseif($request->price == 3) {
            foreach ($prices as $price) {
                $price->price = $price->price_avg;
                $price->price_input = $price->price_input_avg;
                $price->currencyl=$price->currency;
            }
        }

        foreach($prices as $price) {
            $priceDate = explode('-', $price->date);
//                $price->date = $priceDate[2].'.'.$priceDate[1].'.'.$priceDate[0];
            $price->allDate = $priceDate[2].'.'.$priceDate[1].'.'.$priceDate[0];
        }

        if (array_key_exists($request->currency, $this->currency())) {
            $currency = $this->currency()[$request->currency];
        } else {
            $currency = $this->currency()['USD'];
        }

        $currency = $currency[0] / $currency[1];
        $uan = $this->currency()['UAH'][0] / $this->currency()['UAH'][1];

        foreach($prices as $price) {

            if($price->currencyl==Currency::where('charCode', $request->currency)->value('id')){
                $rub = $price->price_input;
                $price->price_input = round($rub,2);
            }else{
                if($request->currency=='RUB'){
                    $rub = $price->price*$uan;
                    $price->price_input = round($rub);
                }else{
                    $rub = $price->price*$uan;
                    $price->price_input = round($rub/$currency,2);
                }}
        }

        foreach ($prices as $price) {
            $price->id_market = Market::where('id', $price->id_market)->value('market');
            $price->id_product = Product::where('id', $price->id_product)->value('name');
            if(isset($price->id_specification)) {
                $price->id_specification = Specification::where('id', $price->id_specification)->value('title');
            } else {
                $price->id_specification = "Нет";
            }
            $price->currency = Currency::where('charCode', $request->currency)->value('currency');
        }

        $this->data = $prices;

//        dd($prices);

        $file = Excel::create('Цены', function($excel) {

            // Set the title
            $excel->setTitle('Цены');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('Файл с даными цен на овощи и фрукты');

            $excel->sheet('Даные', function($sheet) {

                $sheet->cells('A1:F1', function($cells) {

                    $cells->setFontWeight('bold');
                    $cells->setFontSize(15);

                });

                // первая строка
                $sheet->row(1, array(
                    'Рынок', 'Товар', 'Спецификация', 'Цена', 'Валюта', 'Дата'
                ));

                // вторая строка
                $i = 2;
                foreach($this->data as $col) {
                    $sheet->row($i, array(
                        $col->id_market, $col->id_product, $col->id_specification, $col->price_input, $col->currency, $col->allDate
                    ));
                    $i++;
                }

            });

        })->export('xls');
    }
}
