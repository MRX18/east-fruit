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
        $specification = Specification::get();


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

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
                $dateMin = $request->yearMin . '-' . $request->monthMin . '-' . $request->deyMin;
                $dateMax = $request->yearMax . '-' . $request->monthMax . '-' . $request->deyMax;

                $market = explode(',', $request->hidden_market);

                $_price = new Price;
                if (isset($request->specification)) {
                    $price = $_price->price($market, $request->product, $request->specification, $dateMin, $dateMax);
                } else {
                    $price = $_price->priceN($market, $request->product, $dateMin, $dateMax);
                }

                /**/
                foreach ($price as $value) { // розбиваю строку в массив
                    $value->price = explode('-', $value->price);
                }


                foreach($price as $value) { // узнаю всі роки із дат
                        $priceYmd = explode('-', $value->date);
                        $allYmd[] = $priceYmd[0];
                        $value->date = $priceYmd[0];

                }

                $allYmd = array_values(array_unique($allYmd)); // вибираю уникальні значення з массиву і скидаю нумерацію індексів массиву
                $allYmd[] = sort($allYmd);
                unset($allYmd[count($allYmd)-1]);

                /****/


                if($request->price == 1) {
                    foreach($price as $value) {
                        $value->price = $value->price[0];
                    }

                    for($i=0; $i<count($market); $i++) {
                        for($j=0; $j<count($allYmd); $j++) {
                            $p = $price->where('id_market', $market[$i])->where('date', $allYmd[$j])->min('price');
                            $collectionPrice = $price->where('id_market', $market[$i])->where('date', $allYmd[$j])->first();
                            $collectionPrice->price = $p;
                            $priceTable[] = $collectionPrice;
                        }
                    }
                } elseif($request->price == 2) {
                    foreach($price as $value) {
                        $value->price = $value->price[2];
                    }

                    for($i=0; $i<count($market); $i++) {
                        for($j=0; $j<count($allYmd); $j++) {
                            $p = $price->where('id_market', $market[$i])->where('date', $allYmd[$j])->max('price');
                            $collectionPrice = $price->where('id_market', $market[$i])->where('date', $allYmd[$j])->first();
                            $collectionPrice->price = $p;
                            $priceTable[] = $collectionPrice;
                        }
                    }
                } elseif($request->price == 3) {
                    foreach($price as $value) {
                        $value->price = $value->price[1];
                    }

                    for($i=0; $i<count($market); $i++) {
                        for($j=0; $j<count($allYmd); $j++) {
                            $priceTable[] = $price->where('id_market', $market[$i])->where('date', $allYmd[$j])->first();
                        }
                    }
                }
                // узнаю есть ли указаная валюта

                if (array_key_exists($request->currency, $this->currency())) {
                    $currency = $this->currency()[$request->currency];
                } else {
                    $currency = $this->currency()['USD'];
                }
                $currency = $currency[0] / $currency[1];
                $uan = $this->currency()['UAH'][0] / $this->currency()['UAH'][1];


                /*конвертируем валюту*/
                for($i=0; $i<count($priceTable); $i++) {
                    $rub = $priceTable[$i]->price*$uan;
                    $priceTable[$i]->price = round($rub/$currency);
                }

                if($priceTable == null) {
                    $error = true;
                } else {
                    $error = false;
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
                    'currencys' => $currencys,
                    'specification' => $specification,

                    'error' => $error,
                    'view' => $request->view,
                    'priceYeras' => $allYmd,
                    'currency' => $request->currency,
                    'market' => $market,
                    'priceTable' => $priceTable

                ]);
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