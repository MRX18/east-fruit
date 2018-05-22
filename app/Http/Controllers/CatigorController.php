<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use App\CatigorTop;
use App\Article;
use App\Market;
use App\Product;
use App\Price;
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
                    'deyMin'=>'required|size:2',
                    'monthMin'=>'required|size:2',
                    'yearMin'=>'required|size:4',

                    'deyMax'=>'required|size:2',
                    'monthMax'=>'required|size:2',
                    'yearMax'=>'required|size:4',

                    //'market'=>'required|integer',
                    'product'=>'required|integer',
                    'price'=>'required|integer',
                    'currency' => 'required|integer'
                )
            );
            dd($request->market);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
                $dateMin = $request->yearMin.'-'.$request->monthMin.'-'.$request->deyMin;
                $dateMax = $request->yearMax.'-'.$request->monthMax.'-'.$request->deyMax;

                $_price = new Price;
                $price = $_price->price($request->market, $request->product, $request->currency, $dateMin, $dateMax);

                if($request->price == 1) { // минимальная цена
                    $number = $price->min('price');
                } elseif($request->price == 2) { // максимальная цена
                    $number = $price->max('price');
                } elseif($request->price == 3) { // средняя цена
                    $number = $price->avg('price');
                }

                $marketTable = Market::where('id', $request->market)->value('market');
                $productTable = Product::where('id', $request->product)->value('name');
                $dateTable = $request->deyMin.'.'.$request->monthMin.'.'.$request->yearMin.' - '.$request->deyMax.'.'.$request->monthMax.'.'.$request->yearMax;


                if($number == null) {
                    $error = true;
                } else {
                    $error = false;
                }

                return view('price')->with([
                    'title' => $title,
                    'catigories' => $catigories,
                    'otherCatigorTop' => $otherCatigorTop,
                    'keywords' => $keywords,
                    'description' => $description,

                    'markets' => $markets,
                    'products' => $products,
                    'currencys' => $currencys,

                    'marketTable' => $marketTable,
                    'productTable' => $productTable,
                    'dateTable' => $dateTable,
                    'priceTable' => $number,
                    'error' => $error,
                    'date' => $date
                ]);
            }
        }


        return view('price')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,

            'markets' => $markets,
            'products' => $products,
            'currencys' => $currencys,
            'date' => $date
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
        $imagesM = $_image->images(9);

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
}
