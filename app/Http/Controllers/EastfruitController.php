<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use AdminSection;

use App\User;
use App\Control;
use App\Market;
use App\Product;
use App\Specification;
use App\Price;

use Auth;

class EastfruitController extends Controller
{
    public function eastfruit() {
        if(!Auth::check() || !Auth::user()->can('users-list')) {
            return redirect()->back();
        }

        $_user = new User;
        $users = $_user->eastfruit();

        $data = ['users' => $users];

        return AdminSection::view(view('admin.comand-eastfruit', $data), 'Команда East-Fruit');
    }

    public function user($id) {
        if(!Auth::check()) {
           return redirect()->back();
        }

        date_default_timezone_set('Europe/Kiev');
        $_user = new User;
        $_control = new Control;

        $hoursCount = 0;
        $deyCount = 0;
        $nedCount = 0;
        $monthCount = 0;

        $user = $_user->user($id);

        //Y-m-d H:i:s
//        $start = date('Y-m-d H:i:s');
        $sm="-1";
        $time=strtotime("now".$sm." hour");
        $endHours = date('Y-m-d H:i:s',$time); // дата на годину менша за теперішній

        $sm="-24";
        $time=strtotime("now".$sm." hour");
        $endDey = date('Y-m-d H:i:s',$time); // дата на годину менша за теперішній

        $sm="-168";
        $time=strtotime("now".$sm." hour");
        $endNed = date('Y-m-d H:i:s',$time); // дата на годину менша за теперішній

        $sm="-720";
        $time=strtotime("now".$sm." hour");
        $endMounth = date('Y-m-d H:i:s',$time); // дата на годину менша за теперішній


        $userControl = $_control->hours($id);
        foreach($userControl as $value) {
            if(strtotime($value->created_at) >= strtotime($endHours)) {
                $hoursCount++;
            }

            if(strtotime($value->created_at) >= strtotime($endDey)) {
                $deyCount++;
            }

            if(strtotime($value->created_at) >= strtotime($endNed)) {
                $nedCount++;
            }

            if(strtotime($value->created_at) >= strtotime($endMounth)) {
                $monthCount++;
            }
        }

        $date = [
            'user' => $user,
            'hoursCount' => $hoursCount,
            'deyCount' => $deyCount,
            'nedCount' => $nedCount,
            'monthCount' => $monthCount
        ];


        return AdminSection::view(view('admin.user-eastfruit', $date), 'Команда East-Fruit');
    }

    public function tablePrice(Request $request) {
        $markets = Market::get();
        $products = Product::orderBy('name')->get();

        $data = [
            'markets' => $markets,
            'products' => $products
        ];

        if($request->isMethod('post')) {
            $validator = Validator::make($request->all(),
                [
                    'market' => 'required|integer',
                    'product' => 'required|integer',
                ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
                $specifications = Specification::where('id_product', $request->product)->get();

                if(count($specifications) > 0) {
                    foreach($specifications as $specification) {
                        $specification->price = Price::where('id_market',$request->market)
                            ->where('id_product', $request->product)
                            ->where('id_specification', $specification->id)
                            ->where('date', $request->date)
                            ->get();
                    }

                    $market = Market::where('id', $request->market)->first();
                    $product = Product::where('id', $request->product)->first();
                } else {
                    $specifications = false;
                    $market = false;
                    $product = false;
                }

                $data['specification'] = $specifications;
                $data['name_market'] = $market;
                $data['name_product'] = $product;
                $data['date'] = date("d.m.Y", strtotime($request->date));
            }
        }

        return AdminSection::view(view('admin.price-table', $data), 'Сверочная таблица цен');
    }

    public function deletePrice(Request $data) {
        $idPrice = $data->toArray()["_id"];
        Price::whereIn('id', $idPrice)->delete();
        echo "200";
    }
}
