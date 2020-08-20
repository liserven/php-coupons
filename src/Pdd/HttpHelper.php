<?php


namespace Coupons\Pdd;


/**
 * Class HttpHelper
 * @package Coupons\Pdd
 * 拼多多优惠券帮助类
 */

class HttpHelper
{


    public static function generateSign($params = array(), $client_secret = "", $method = "md5") :string
    {
        if (!is_array($params)||empty($params))
        {
            return "";
        }
        ksort($params, SORT_STRING);
        $signStr = "$client_secret";
        foreach ( $params as $k => $val)
        {
            $signStr .= $k.$val;
        }
        $signStr .= "$client_secret";
        $signStr = strtoupper(md5($signStr));
        return $signStr;
    }

}
