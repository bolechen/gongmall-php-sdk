<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Bolechen\Gongmall;

class Merchant extends Api
{
    /**
     * 查询企业当前余额.
     *
     * @see https://opendoc.gongmall.com/merchant/merchant-account/cha-xun-qi-ye-yu-e-merchant.html
     *
     * @return array
     * @throws \JsonException
     */
    public function queryBalance(): array
    {
        return $this->request('/api/merchant/queryBalance');
    }
}
