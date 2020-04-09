<?php
namespace App\Common\Rabbitmq;

class Rabbitmq {

    public function __construct($host = '', $port = '', $login = '', $password = '', $vhost = '')
    {
        $conn = [
            'host' => env('RABBITMQ_HOST', $host),
            'port' => env('RABBITMQ_POST', $port),
            'login' => env('RABBITMQ_LOGIN', $login),
            'password' => env('RABBITMQ_PASSWORD', $password),
            'vhost' => env('RABBITMQ_VHOST', $vhost)
        ];

        $conn = new \AMQPConnection($conn);
        if(!$conn->connect()){
            die(123);
        }

    }
}
