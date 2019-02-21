<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

return [
    'apiKey' => 'a49048c8df010124fb9d758ead180d70',
    'apiSecret' => 'a75168036eb82c4db9f4cd5294355e37',
    'contractUrl' => 'https://contract-qa.gongmall.com/url_contract.html?companyId=qP3gZP&positionId=4Pmp2V',

    'debug' => false, // 输出日志
    'sandbox' => true, //沙盒

    'log' => [
        'name' => 'gongmall',
        'file' => __DIR__.'gongmall.log',
        'level' => 'debug',
        'permission' => 0777,
    ],
];
