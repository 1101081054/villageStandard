<?php
namespace App\Common\Rabbitmq;

use Illuminate\Support\Facades\Log;

class Rabbitmq {

    public function __construct($host = '', $port = '', $login = '', $password = '', $vhost = '')
    {
        try {
            $conn = [
                'host' => env('RABBITMQ_HOST', $host),
                'port' => env('RABBITMQ_PORT', $port),
                'login' => env('RABBITMQ_LOGIN', $login),
                'password' => env('RABBITMQ_PASSWORD', $password),
                'vhost' => env('RABBITMQ_VHOST', $vhost)
            ];
            $amqp = new AMQPConnection($conn);

        }catch (\Exception $e){
            Log::error($e->getMessage());
            return false;
        }

        if(!$amqp->isConnected()){
            echo '失败';
            Log::error('Cannot connect to the broker! It might not be running');
            return false;
        }else {
            echo '成功';
        }


        return $amqp;
    }
}
