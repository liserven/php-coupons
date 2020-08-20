<?php


namespace Coupons;


class Request
{
    public static function Post($url, $data = array())
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //普通数据
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        $res = curl_exec($curl);

        //$info = curl_getinfo($ch);
        curl_close($curl);
        return $res;
    }
}
