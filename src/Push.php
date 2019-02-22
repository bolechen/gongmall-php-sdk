<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Bolechen\Gongmall;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Push extends Api
{
    /**
     * @var Request
     */
    private $request;

    public function __construct($apiKey, $apiSecret, Request $request)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->request = $request;
    }

    /**
     * @return Response|array
     *
     * @throws Exception
     */
    public function parse($data = null)
    {
        if (!$data) {
            $data = json_decode($this->request->getContent(), true);
        }

        $this->checkSign($data);
        $data['msg'] = json_decode(urldecode($data['msg']), true);

        return $data;
    }

    public function checkSign(array $data)
    {
        $sign = $this->signature($data);

        if ($sign != $data['sign']) {
            throw new \Exception('签名不正确');
        }
    }

    public function response()
    {
        return Response::create(json_encode(['code' => 0, 'msg' => 'success']));
    }
}
