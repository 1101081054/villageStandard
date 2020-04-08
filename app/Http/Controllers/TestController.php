<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Common\Request\Http;

class TestController extends Controller{
    public function test(){
//        $content = Http::getUrl('http://local.villagestandard.com/testApi');
//        dd($content);
        $data = Json(array(123,456));
        var_dump($data);
    }



    public function testApi(){
        return response()->json([123,456,7489,123]);
    }
}
