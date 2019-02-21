<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Bolechen\Gongmall;

class Company extends Api
{
    /**
     * 查询企业当前余额.
     *
     * @see   https://opendoc.gongmall.com/shi-shi-ti-xian/cha-xun-qi-ye-yu-e.html
     *
     * @return string
     **/
    public function getBalance()
    {
        return $this->request('/api/company/getBalance');
    }
}
