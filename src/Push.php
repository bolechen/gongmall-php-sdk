<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Bolechen\Gongmall;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class Push extends Api
{
    /**
     * @param null|mixed $postRaw
     *
     * @return array|Response
     */
    public function parse($postRaw = null)
    {
        if (!$postRaw) {
            $postRaw = $this->app->request->getContent();
        }

        parse_str($postRaw, $data);
        if (!is_array($data)) {
            throw new RuntimeException('数据不正确');
        }

        $this->checkSign($data);

        return $data;
    }

    public function checkSign(array $data): void
    {
        $sign = $this->signature($data);

        if (!isset($data['sign']) || $sign !== $data['sign']) {
            throw new RuntimeException('签名不正确');
        }
    }

    public function response(): Response
    {
        return new Response(json_encode(['code' => 0, 'msg' => 'success']));
    }
}
