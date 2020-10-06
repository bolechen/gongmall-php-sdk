# 工猫 sdk for php，非官方维护

[![Build Status](https://travis-ci.org/bolechen/gongmall-php-sdk.svg?branch=master)](https://travis-ci.org/bolechen/gongmall-php-sdk)
[![StyleCI](https://github.styleci.io/repos/171791114/shield?branch=master)](https://github.styleci.io/repos/171791114)
![Packagist Downloads](https://img.shields.io/packagist/dt/bolechen/gongmall-php-sdk)
![Packagist Version](https://img.shields.io/packagist/v/bolechen/gongmall-php-sdk)
![GitHub](https://img.shields.io/github/license/bolechen/gongmall-php-sdk)

工猫（gongmall.com）官网文档参见：https://opendoc.gongmall.com

- Base on [hanson/foundation-sdk](https://github.com/HanSon/foundation-sdk) 
- 仅实现了几个常用功能，如需要增加功能，可以参考 Employee.php 自行扩展，欢迎 PR

## Installing

```bash
composer require bolechen/gongmall-php-sdk -vvv
```

## Usage

```php
<?php

$gongmall = new \Bolechen\Gongmall\Gongmall([
    'apiKey' => '',
    'apiSecret' => '',
    'contractUrl' => '', //电签网址

    'debug' => true, // 调试模式
    'sandbox' => true, //沙盒模式

    'log' => [
        'name' => 'gongmall',
        'file' => __DIR__.'/gongmall.log',
        'level'      => 'debug',
        'permission' => 0777,
    ]
]);

// 电签地址
$result = $gongmall->employee->getContractUrl(['name' => '张三', 'mobile' => 'xxx', 'idNumber' => 'xxx']);

// 查询电签结果
$result = $gongmall->employee->getContractStatus($array);

// 查询企业当前余额
$result = $gongmall->company->getBalance();
```

## Test

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
