<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DateTime;
use DateInterval;
use DatePeriod;

use App\CatigorTop;
use App\Article;
use App\Market;
use App\Product;
use App\Price;
use App\Specification;
use App\Currency;
use App\Image;
use App\Question;
use App\Answer;

class CatigorController extends Controller
{
    public function index($id) {
        $title = "Главная";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
        $slug_catigor = $id;

        foreach($catigories as $catigor) {
            if($catigor->slug == $id) {
                $title = $catigor->title;
                $id = $catigor->id;
            }
        }
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - на сайте east-fruit.com";

        $_article = new Article();
        $_question = new Question();
        $_answer = new Answer();

        $articles = $_article->articleCatigor($id, 24);
        $slider = $_article->articleInIndexPage('baner', 1, 3);

        foreach($articles as $option) {
            foreach ($catigories as $catigor) {
                if($option->id_catigories == $catigor->id) {
                    $option->catigor = $catigor->title;
                }
            }
        }

        $question = $_question->question();
        $answer = $_answer->answer($question->id);

        return view('catigories')->with([
            'title' => $title,
            'slug_catigor' => $slug_catigor,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,

            'articles' => $articles,
            'slider' => $slider,

            'question' => $question,
            'answer' => $answer
        ]);
    }

    // public function bottomCatigor($id) {
    //     $title = "Главная";
    //     $catigories = $this->catigorTop();
    //     $otherCatigorTop = $this->otherCatigorTop();

    //     foreach($catigories as $catigor) {
    //         if($catigor->id == $id) {
    //             $title = $catigor->title;
    //         }
    //     }
    //     $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
    //     $description = $title." - на сайте east-fruit.com";

    //     $_article = new Article();

    //     $articles = $_article->articleCatigor($id, 24);
    //     $slider = $_article->articleInIndexPage('baner', 1, 3);

    //     foreach($articles as $option) {
    //         foreach ($catigories as $catigor) {
    //             if($option->id_catigories == $catigor->id) {
    //                 $option->catigor = $catigor->title;
    //             }
    //         }
    //     }

    //     return view('catigories')->with([
    //         'title' => $title,
    //         'catigories' => $catigories,
    //         'otherCatigorTop' => $otherCatigorTop,
    //         'keywords' => $keywords,
    //         'description' => $description,

    //         'articles' => $articles,
    //         'slider' => $slider
    //     ]);
    // }


    public function prices(Request $request) {
        $title = 'Цены';
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - на сайте east-fruit.com";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
        // dd($this->currency());

        $markets = Market::get();
        $products = Product::get();
        $currencys = Currency::get();

        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateString();
        $date = explode('-', $date);
        // dd($date);

        if($request->isMethod('post')) {

            $validator = Validator::make($request->all(),
                array(
                    'deyMin' => 'required|size:2',
                    'monthMin' => 'required|size:2',
                    'yearMin' => 'required|size:4',

                    'deyMax' => 'required|size:2',
                    'monthMax' => 'required|size:2',
                    'yearMax' => 'required|size:4',

                    'market' => 'required',
                    'product' => 'required|integer',
                    'specification' => 'integer',
                    'price' => 'required|integer',
                    'currency' => 'required',
                    'view' => 'required|integer'
                )
            );
            // dd($request->hidden_market);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
                $dateMin = $request->yearMin . '-' . $request->monthMin . '-' . $request->deyMin;
                $dateMax = $request->yearMax . '-' . $request->monthMax . '-' . $request->deyMax;

                $market = explode(',', $request->hidden_market);

                $_price = new Price;
                if (isset($request->specification)) {
                    $price = $_price->price($market, $request->product, $request->specification);
                } else {
                    $price = $_price->priceN($market, $request->product);
                }

                /**/
                foreach ($price as $value) { // розбиваю строку в массив
                    $value->price = explode(',', $value->price);
                    $value->date = explode(',', $value->date);
                }

                $dateRang = $this->dateRange($dateMin, $dateMax); // нахожу всі дати в указаному діапазоні

                foreach($price as $value) { // вибвраю тільки ті даті які підходять вказаному діапазоні
                    for($i=0; $i<count($value->date); $i++) {
                        for($j=0; $j<count($dateRang); $j++) {
                            if(trim($value->date[$i]) == trim($dateRang[$j])) {
                                $ymd[] = $value->date[$i];
                                $priceYmd[] = $value->price[$i];
                            }
                        }
                    }
                    $value->date = $ymd;
                    $value->price = $priceYmd;
                    unset($ymd);
                    unset($priceYmd);
                }

                foreach($price as $value) {
                    for($i=0; $i<count($value->date); $i++) {
                        $ymd[] = explode('-', $value->date[$i]);
                        $year[] = $ymd[][0];
                    }
                    $value->date = $ymd;
                }
                /*------------------*/




                // узнаю есть ли указаная валюта
//                if (array_key_exists($request->currency, $this->currency())) {
//                    $currency = $this->currency()[$request->currency];
//                } else {
//                    $currency = $this->currency()['USD'];
//                }
//                $currency = $currency[0] / $currency[1];
//                $uan = $this->currency()['UAH'][0] / $this->currency()['UAH'][1];
//
//                /*конвертируем валюту*/
//                foreach($price as $value) {
//                    for($i=0; $i<count($value->price); $i++) {
//                        $rub = $value->price[$i]*$uan;
//                        $value->price[$i] = round($rub/$currency);
//                    }
//                }
            }
        }

        return view('price')->with([
            'title' => $title,
            'keywords' => $keywords,
            'description' => $description,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'date' => $date,
            'markets' => $markets,
            'products' => $products,
            'currencys' => $currencys
        ]);
    }

    public function specification(Request $request) { //Спезализация в розделе цен
        $_specification = new Specification;
        $specification = $_specification->specification($request->product);
        $spec = array();
        foreach($specification as $value) {
            $spec[$value->id] = $value->title;
        }
        $spec = json_encode($spec);
        return response([
            'specification' => $spec
        ]);
    }

    public function allArticle() {
        $title = "Все статьи";
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - сайтa east-fruit.com";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_question = new Question();
        $_answer = new Answer();

        $articles = $_article->allArticles(24);

        $question = $_question->question();
        $answer = $_answer->answer($question->id);

        foreach($articles as $option) {
            foreach ($catigories as $catigor) {
                if($option->id_catigories == $catigor->id) {
                    $option->catigor = $catigor->title;
                }
            }
        }

        return view('all-article')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,

            'articles' => $articles,

            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function image() {
        $title = "Фотогалерея";
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - на сайте east-fruit.com";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_image = new Image();

        $slider = $_article->articleInIndexPage('baner', 1, 3);

        $images = $_image->images(42);

        return view('images')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,

            'slider' => $slider,
            'images' => $images
        ]);
    }

    public function imageArticle($id) {
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_image = new Image();

        $sitebar = $_article->sitebar(10);
        $article = $_image->imageArticle($id);
        $article->images = json_decode($article->images, true);

        $title = $article->title;
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title;

        return view('image-article')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,
            'sitebarArticle' => $sitebar,

            'article' => $arti