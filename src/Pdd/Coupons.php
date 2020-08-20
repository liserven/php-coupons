<?php


namespace Coupons\Pdd;


class Coupons
{

    //拼多多配置信息
    private $config;

    public function __construct(PddConfig $config)
    {
        $this->config=$config;
    }

    public function recommendGoods(){}
}
