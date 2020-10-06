<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Bolechen\Gongmall;

use Hanson\Foundation\AbstractAPI;

class Api extends AbstractAPI
{
    const API_URL = 'https://openapi.gongmall.com';
    const SANDBOX_API_URL = 'https://openapi-qa.gongmall.com';

    protected $apiKey;
    protected $apiSecret;
    protected $contractUrl;

    private $url;

    public function __construct(Gongmall $app)
    {
        $config = $app->getConfig();

        $this->apiKey = $config['apiKey'];
        $this->apiSecret = $config['apiSecret'];
        $this->contractUrl = $config['contractUrl'];

        //沙盒环境
        $this->apiUrl = (isset($config['sandbox']) && $config['sandbox']) ? static::SANDBOX_API_URL : static::API_URL;
    }

    /**
     * @param string $uri
     * @param array  $params
     *
     * @return array
     */
    public function request($uri, $params = [])
    {
        $http = $this->getHttp();

        $params['appKey'] = $this->apiKey;
        $params['nonce'] = $this->createNonceStr();
        $params['timestamp'] = strval(microtime(true) * 10000);

        $protocol = $params;
        $protocol['sign'] = $this->signature($params);

        $response = $http->post($this->apiUrl.$uri, $protocol);

        return json_decode($response->getBody(), true);
    }

    /**
     * 验签.
     *
     * @see https://opendoc.gongmall.com/overview/jie-kou-gui-fan.html
     *
     * @return string
     */
    protected function signature(array $paramArr)
    {
        //去除空参数，不参与签名
        unset($paramArr['sign']);
        foreach ($paramArr as $k => $v) {
            if (!$v) {
                unset($paramArr[$k]);
            }
        }

        ksort($paramArr);
        $paramArr['appSecret'] = $this->apiSecret;
        $paramStr = urldecode(http_build_query($paramArr));

        return strtoupper(md5($paramStr));
    }

    /**
     * 生成电签地址签名.
     *
     * @see https://opendoc.gongmall.com/dian-qian-he-tong/jie-ru-zhi-nan.html
     *
     * @return string
     */
    protected function employeeEncrypt(array $data)
    {
        // data为AES加密数据
        $plaintext = urldecode(http_build_query($data));

        // 加密key由配置的appKey与appSecret生成
        $key = strtoupper(md5($this->apiKey.$this->apiSecret));

        // 偏移量
        $size = 16;
        $iv = str_repeat("\0", $size);

        // 添加Padding，使用 //PKCS5Padding
        $padding = $size - strlen($plaintext) % $size;
        $plaintext .= str_repeat(chr($padding), $padding);

        // 使用AES-192-CBC进行加密
        return openssl_encrypt($plaintext, 'AES-192-CBC', base64_decode($key), OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv);
        // 加密结果
    }

    private function createNonceStr($length = 16)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }

        return $str;
    }
}
