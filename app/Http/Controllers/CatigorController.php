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
use App\Specification;
use App\Currency;
use App\Image;
use App\Question;
use App\Answer;
use App\Video;

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

    public function prices() {
        $title = 'Цены';
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - на сайте east-fruit.com";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $markets = Market::get();
        $products = Product::get();
        $currencys = Currency::get();
        $specification = Specification::get();


        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateString();
        $date = explode('-', $date);


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


    public function priceAjax(Request $request) {
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

        if ($validator->fails()) {
            $returnHTML = view('includes.errors')->with(['errors' => $validator->errors()])->render();

            return response()->json([
                'errors' => $returnHTML
            ]);
        } else {
            $_price = new Price();

            $dateMin = $request->yearMin.'-'.$request->monthMin.'-'.$request->deyMin;
            $dateMax = $request->yearMax.'-'.$request->monthMax.'-'.$request->deyMax;

            $market = explode(',', $request->hidden_market);

            if(isset($request->specification)) {
                $prices = $_price->price($market, $request->product, $request->specification, $dateMin, $dateMax);
            } else {
                $prices = $_price->priceN($market, $request->product, $dateMin, $dateMax);
            }


            if($request->price == 1) {
                foreach ($prices as $price) {
                    $price->price = $price->price_min;
                    $price->price_input = $price->price_input_min;
                }
            } elseif($request->price == 2) {
                foreach ($prices as $price) {
                    $price->price = $price->price_max;
                    $price->price_input = $price->price_input_max;
                }
            } elseif($request->price == 3) {
                foreach ($prices as $price) {
                    $price->price = $price->price_avg;
                    $price->price_input = $price->price_input_avg;
                }
            }

            $date = array();
            foreach($prices as $price) {
                $priceDate = explode('-', $price->date);
                $price->date = $priceDate[1].'.'.$priceDate[0];
                $price->allDate = $priceDate[2].'.'.$priceDate[1].'.'.$priceDate[0];
                $date[] = $priceDate[1].'.'.$priceDate[0];
            }

            $date = array_values(array_unique($date));

            for($i=0; $i<count($market); $i++) {
                for($j=0; $j<count($date); $j++) {
                    $var = $prices->where('id_market', $market[$i])->where('date', $date[$j])->first();

                    if(!isset($var)) {
                        $error[] = $market[$i];
                    }
                }
            }

            if(isset($error)) {
                $error = array_values(array_unique($error));

                foreach($prices as $price) {
                    for($i=0; $i<count($error); $i++) {
                        if($price->id_market != $error[$i]) {
                            $collection[] = $price;
                        }
                    }
                }
                $prices = collect($collection);
                unset($collection);
            }

            $collection = array();
            if($request->price == 1) {
                for($i=0; $i<count($market); $i++) {
                    for($j=0; $j<count($date); $j++) {
                        $collection[] = $prices->where('id_market', $market[$i])->where('date', $date[$j])->sortBy('price')->first();
                    }
                }

                $prices = collect($collection);
            } elseif($request->price == 2) {
                for($i=0; $i<count($market); $i++) {
                    for($j=0; $j<count($date); $j++) {
                        $collection[] = $prices->where('id_market', $market[$i])->where('date', $date[$j])->sortByDesc('price')->first();
                    }
                }

                $prices = collect($collection);
            } elseif($request->price == 3) {
                for($i=0; $i<count($market); $i++) {
                    for($j=0; $j<count($date); $j++) {
                        $p = $prices->where('id_market', $market[$i])->where('date', $date[$j]);

                        foreach($p as $value) {
                            $array[] = $value->price;
                        }

                        $result = $this->avgPrice($array);
                        unset($array);

                        $p = $prices->where('id_market', $market[$i])->where('date', $date[$j])->first();
                        $p->price = $result;

                        $collection[] = $p;
                    }
                }
                $prices = collect($collection);
            }



            if (array_key_exists($request->currency, $this->currency())) {
                $currency = $this->currency()[$request->currency];
            } else {
                $currency = $this->currency()['USD'];
            }

            $currency = $currency[0] / $currency[1];
            $uan = $this->currency()['UAH'][0] / $this->currency()['UAH'][1];

            foreach($prices as $price) {
                $rub = $price->price*$uan;
                $price->price_input = round($rub/$currency);
            }

            $markets = Market::whereIn('id', $market)->get();

            if($request->view == 1) {
                $returnHTML = view('includes.graph')->with(['date'=>$date, 'markets'=>$markets, 'prices'=>$prices])->render();

                return response()->json([
                    'graph' => $returnHTML
                ]);
            } elseif($request->view == 2) {
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

                $returnHTML = view('includes.table')->with(['prices'=>$prices])->render();

                return response()->json([
                    'table' => $returnHTML
                ]);
            }


//            foreach($prices as $price) {
//                dump($price->price);
//            }

        }
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
        $_question = new Question();
        $_answer = new Answer();

        $slider = $_article->articleInIndexPage('baner', 1, 3);
        $images = $_image->images(42);

        $question = $_question->question();
        $answer = $_answer->answer($question->id);


        return view('images')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,
            'slider' => $slider,
            'images' => $images,

            'question' => $question,
            'answer' => $answer
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
            'article' => $article
        ]);
    }

    /*video*/
    public function video() {
        $title = "Видео";
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - на сайте east-fruit.com";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_video = new Video();
        $_question = new Question();
        $_answer = new Answer();

        $slider = $_article->articleInIndexPage('baner', 1, 3);
        $video = $_video->video(42);

        $question = $_question->question();
        $answer = $_answer->answer($question->id);


        return view('video')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,
            'slider' => $slider,
            'images' => $video,

            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function videoArticle($id) {
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_video = new Video();

        $sitebar = $_article->sitebar(10);
        $article = $_video->article($id);


        $title = $article->title;
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title;
        return view('video-article')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,
            'sitebarArticle' => $sitebar,
            'article' => $article
        ]);
    }


}