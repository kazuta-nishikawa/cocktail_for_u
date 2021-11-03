<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\CocktailConst;



class CocktailController extends Controller
{
    public function gacha(){
        return view('cocktails.index');
    }


    /*==================================
    カクテルガチャの結果表示(show)
    ==================================*/
    public function show(Request $request){

        $inputs = $request->all();

        $alcohol = null;
        if(!empty($inputs['alcohol'])){
            $input_alc = $inputs['alcohol'];
                // 低い
                if($input_alc == '1'){
                    $alcohol = 'alcohol_from=1&alcohol_to=8&';
                }
    
                // 普通
                if($input_alc == '2'){
                    $alcohol = 'alcohol_from=9&alcohol_to=24&';
                }
    
                // 高い
                if($input_alc == '3'){
                    $alcohol = 'alcohol_from=25&alcohol_to=100&';
                }
        }

        $base = null;
        if(!empty($inputs['base'])){
            $input_base = $inputs['base'];
            $base = 'base='.$inputs['base'].'&';
        }
        
        $limit = 'limit=100';
        $id = null;
        $method = "GET";
        if(!empty($base) && !empty($alcohol) ){
            $client = new Client();
            $url = "https://cocktail-f.com/api/v1/cocktails?". $alcohol.$base.$limit;
            
            $response = $client->request($method, $url);
            $json_data = $response->getBody();
            $converted_json_to_arr = json_decode($json_data, true);
            $cocktails = $converted_json_to_arr['cocktails'];
            $id = array_rand($cocktails,1);
            // dd($cocktails,$id);
        }else{
            // API接続準備 
            // 条件なしの場合
            $min = 1;
            $max = 264;
            $id = rand($min,$max);
        }
        
        //API接続
        $client = new Client();
        $url = "https://cocktail-f.com/api/v1/cocktails/". $id;
        $response = $client->request($method, $url);
        $json_data = $response->getBody();
        $converted_json_to_arr = json_decode($json_data, true);
        $cocktail = $converted_json_to_arr['cocktail'];
        
        
        return view('cocktails.show',compact('cocktail','input_alc','input_base'));
    }
}

