<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Bolechen\Gongmall;

class Withdraw extends Api
{
    /**
     * 算税信息.
     *
     * @see   https://opendoc.gongmall.com/suan-shui-xin-xi-cha-xun.html
     *
     * @return array
     */
    public function getTaxInfo(array $params)
    {
        return $this->request('/api/withdraw/getTaxInfo', $params);
    }
}
