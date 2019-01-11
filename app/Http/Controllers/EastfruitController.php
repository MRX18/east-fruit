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
        $data = array();
        $dataPrice = array();
        $marketsId = array();
        if($request->isMethod('post')) {
            $prices = Price::where('date', $request->date)->get();
            $products = Product::get();
            $specifications = Specification::get();
            $markets = Market::get();

            foreach ($markets as $m) {
                $marketsId[] = $m->id;
            }

            foreach ($products as $p) {
                if($specifications->where("id_product", $p->id)->count() > 0) {
                    $specification = $specifications->where("id_product", $p->id);
                    foreach ($specification as $s) {
                        if($prices->whereIn("id_market", $marketsId)->where("id_product", $p->id)->where("id_specification", $s->id)->count() > 0) {
                            $price = $prices->whereIn("id_market", $marketsId)->where("id_product", $p->id)->where("id_specification", $s->id);
                            $mId = array();
                            foreach($price as $pr) {
                                $mId[] = $pr->id_market;
                            }

                            $dataPrice[] = array(
                                "product" => $p->name,
                                "specification" => $s->title,
                                "marker" => $mId,
                                "price" => "Есть"
                            );
                        } else {
                            $dataPrice[] = array(
                                "product" => $p->name,
                                "specification" => $s->title,
                                "marker" => 0,
                                "price" => "Нет"
                            );
                        }
                    }
                } else {
                    if($prices->whereIn("id_market", $marketsId)->where("id_product", $p->id)->where("id_specification", NULL)->count() > 0) {
                        $price = $prices->whereIn("id_market", $marketsId)->where("id_product", $p->id)->where("id_specification", NULL);
                        $mId = array();
                        foreach($price as $pr) {
                            $mId[] = $pr->id_market;
                        }

                        $dataPrice[] = array(
                            "product" => $p->name,
                            "specification" => "Нет",
                            "marker" => $mId,
                            "price" => "Есть"
                        );
                    } else {
                        $dataPrice[] = array(
                            "product" => $p->name,
                            "specification" => "Нет",
                            "marker" => 0,
                            "price" => "Нет"
                        );
                    }
                }
            }

            //dd($dataPrice);

            $data = [
                "prices" => $dataPrice,
                "markets" => $markets,
                "date" => $request->date
            ];

                //$data['date'] = date("d.m.Y", strtotime($request->date));
        }

        return AdminSection::view(view('admin.price-table', $data), 'Сверочная таблица цен');
    }

    public function deletePrice(Request $data) {
        $idPrice = $data->toArray()["_id"];
        Price::whereIn('id', $idPrice)->delete();
        echo "200";
    }
}
