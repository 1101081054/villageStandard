<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Common\Request\Http;
use App\Common\Rabbitmq\Rabbitmq;

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

    public function rabbitmq(){
        new Rabbitmq();
    }
}
