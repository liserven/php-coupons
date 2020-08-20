<?php


namespace Coupons\Pdd;


use Coupons\Pdd\Bean\ReCommendGoodsBean;
use Coupons\Request;

class RecommendGoods extends PddAbstruct
{


    //请求地址
    protected $base_url = "http://gw-api.pinduoduo.com/api/router";
    protected $recommendGoodsBean;
    protected $config;

    public function __construct(ReCommendGoodsBean $reCommendGoodsBean, PddConfig $config)
    {
        $this->recommendGoodsBean = $reCommendGoodsBean;
        $this->config = $config;
    }

    public function initiating()
    {
        $data = array();
        $data = $this->config->toArray(null, 1);

        $newData = array_merge($data, $this->recommendGoodsBean->toArray(null, 1));
        $screct = $newData['client_secret'];
        unset($newData['client_secret']);
        $sign = HttpHelper::generateSign($newData, $screct);
        $newData['sign'] = $sign;
        $res=Request::Post($this->base_url, $newData);
        var_dump(json_decode($res,true));

    }

    public function combinationParams() :array
    {
        $params = array();

        if ( $this->cat_id ) {
            $params['cat_id'] = $this->cat_id;
        }
        if ( $this->channel_type ) {
            $params['channel_type'] = $this->channel_type;
        }
        if ( $this->custom_parameters ) {
            $params['custom_parameters'] = $this->custom_parameters;
        }
        if ( $this->limit ) {
            $params['limit'] = $this->limit;
        }
        if ( $this->list_id ) {
            $params['list_id'] = $this->list_id;
        }
        if ( $this->offset ) {
            $params['offset'] = $this->offset;
        }
        if ( $this->pid ) {
            $params['pid'] = $this->pid;
        }
        if ( $this->goods_ids ) {
            $params['goods_ids'] = $this->goods_ids;
        }
        return $params;
    }


}
