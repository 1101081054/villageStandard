<?php
namespace App\Common\Request;

class Http{

    private static $lastCookieFile = '';

    public static function postUrl($url, $postData = false, $header = false) {
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //返回数据不直接输出
        curl_setopt($ch, CURLOPT_ENCODING, "gzip"); //指定gzip压缩

        //add header
        if(!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        //add ssl support
        if(substr($url, 0, 5) == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    //SSL 报错时使用
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);    //SSL 报错时使用
        }

        //add 302 support
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch,CURLOPT_COOKIEFILE, static::$lastCookieFile); //使用提交后得到的cookie数据

        //add post data support
        if(!empty($postData)) {
            curl_setopt($ch,CURLOPT_POST, 1);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $postData);
        }
        try {
            $content = curl_exec($ch); //执行并存储结果
        } catch (\Exception $e) {
            //记录日志
//            $this->_log($e->getMessage());
        }

        $curlError = curl_error($ch);
        if(!empty($curlError)) {
            //记录日志
//            $this->_log($curlError);
        }

        curl_close($ch);
        return $content;
    }

    public static function getUrl($url, $header = false) {
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //返回数据不直接输出
        curl_setopt($ch, CURLOPT_ENCODING, "gzip"); //指定gzip压缩

        //add header
        if(!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        //add ssl support
        if(substr($url, 0, 5) == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    //SSL 报错时使用
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);    //SSL 报错时使用
        }

        //add 302 support
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch,CURLOPT_COOKIEFILE, static::$lastCookieFile); //使用提交后得到的cookie数据

        try {
            $content = curl_exec($ch); //执行并存储结果
        } catch (\Exception $e) {
            //记录日志
//            $this->_log($e->getMessage());
        }

        $curlError = curl_error($ch);
        if(!empty($curlError)) {
            //记录日志
//            $this->_log($curlError);
        }

        curl_close($ch);
        return $content;
    }


}
