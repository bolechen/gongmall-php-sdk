<?php

namespace Bolechen\Gongmall;

class Withdraw extends Api
{
    /**
     * 算税信息
     *
     * @link https://opendoc.gongmall.com/suan-shui-xin-xi-cha-xun.html
     * @return string
     **/
    public function getTaxInfo(array $params)
    {
        return $this->request('/api/withdraw/getTaxInfo', $params);
    }
}
