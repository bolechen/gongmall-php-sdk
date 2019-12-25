<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Bolechen\Gongmall;

use Hanson\Foundation\Foundation;

/**
 * Class Gongmall.
 *
 * @property \Bolechen\Gongmall\Employee $employee
 * @property \Bolechen\Gongmall\Withdraw $withdraw
 * @property \Bolechen\Gongmall\Company  $company
 * @property \Bolechen\Gongmall\Push     $push
 */
class Gongmall extends Foundation
{
    protected $providers = [
        GongmallServiceProvider::class,
    ];

    /**
     * API 请求
     *
     * @param string $uri
     * @param array  $params
     *
     * @return array
     */
    public function request($uri, $params = [])
    {
        return $this->api->request($uri, $params);
    }
}
