<?php

namespace Bolechen\Gongmall;

use Hanson\Foundation\Foundation;

/**
 * Class Gongmall
 * @package Bolechen\Gongmall
 *
 * @property \Bolechen\Gongmall\Employee    $employee
 * @property \Bolechen\Gongmall\Withdraw    $withdraw
 * @property \Bolechen\Gongmall\Company     $company
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
     * @param array $params
     * @return array
     */
    public function request($uri, $params = [])
    {
        return $this->api->request($uri, $params);
    }
}
