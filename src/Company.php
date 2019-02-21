<?php

namespace Bolechen\Gongmall;

class Company extends Api
{
    /**
     * 查询企业当前余额
     *
     * @link https://opendoc.gongmall.com/shi-shi-ti-xian/cha-xun-qi-ye-yu-e.html
     * @return string
     **/
    public function getBalance()
    {
        return $this->request('/api/company/getBalance');
    }
}
