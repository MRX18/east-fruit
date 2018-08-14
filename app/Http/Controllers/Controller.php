<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\CatigorTop;
use App\OtherTopCatigorie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function catigorTop() {
    	return CatigorTop::get();
    }

    protected function otherCatigorTop() {
    	return OtherTopCatigorie::get();
    }

    /*date*/
    public function dateFirst($date) {
    	$date = explode('-', $date);
        return $date[2].'.'.$date[1].'.'.$date[0];
    }

    public function dateSitebar($colection) {
        foreach($colection as $article) {
            $date = explode('-', $article->date);
            $article->date = $date[2].'.'.$date[1];
        }

        return $colection;
    }

    public function dateCatigor($colection) {
        foreach($colection as $article) {
            if(isset($article->date)) {
                $date = explode('-', $article->date);
                $article->date = $date[2].'.'.$date[1].'.'.$date[0];
            }
        }

        return $colection;
    }

    public function dateRange($first, $last) { //Виртає всі дати в указаном діапазоні
        $step = '+1 day';
        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while( $current <= $last ) {

            $dates[] = date('Y-m-d', $current);
            $current = strtotime($step, $current);
        }


        return $dates;
    }




    public function currency() {
        header("Content-Type: text/html; charset=utf-8");

        $date = date("d/m/Y"); // Текущая дата
        $feed ="https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $feed);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // get the result of http query
        $output = curl_exec($ch);
        curl_close($ch);

        $content = simplexml_load_string($output);

//        ini_set("allow_url_fopen", true);
//        header("Content-Type: text/html; charset=utf-8");
//        $date = date("d/m/Y"); // Текущая дата
//        $content = simplexml_load_file("https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date);

        $currency = array();
        
        foreach($content->Valute as $cur) { 
            $currency["{$cur->CharCode}"] = [str_replace(",", ".", $cur->Value), (int)$cur->Nominal];
        }
        return $currency;
    }

    public function avgPrice($array) {
        $unique = array_values(array_unique($array));
        $count = array();
        for($i=0; $i<count($unique); $i++) {
            $count[$unique[$i]] = 0;
        }

        for($i=0; $i<count($unique); $i++) {
            for($j=0; $j<count($array); $j++) {
                if($unique[$i] == $array[$j]) {
                    $count[$unique[$i]] += 1;
                }
            }
        }

        $max = max($count);
        $key = array_search($max, $count);

        return $key;
    }
}
