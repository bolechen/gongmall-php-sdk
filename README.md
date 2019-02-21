
# 工猫 sdk for php，非官方维护

官网文档参见：https://opendoc.gongmall.com.</p>

base on [foundation-sdk](https://github.com/HanSon/foundation-sdk)

## Installing

```shell
$ composer require bolechen/gongmall-php-sdk -vvv
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

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/bolechen/gongmall-php-sdk/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/bolechen/gongmall-php-sdk/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
