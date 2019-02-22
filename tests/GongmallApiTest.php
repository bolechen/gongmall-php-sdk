<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Bolechen\Gongmall;

use PHPUnit\Framework\TestCase;

class GongmallApiTest extends TestCase
{
    public $gongmall;
    public $data = [];

    protected function setUp()
    {
        parent::setUp();

        $config = require 'config.php';
        $this->gongmall = new Gongmall($config);

        $data['name'] = '张三';
        $data['mobile'] = '18627000000';
        $data['workNumber'] = rand(1, 9999);
        $data['certificateType'] = 1;
        $data['idNumber'] = '411423198309221234';
        $data['identity'] = '411423198309221234';

        $this->data = $data;
    }

    /**
     * Employee Tests.
     */
    public function testEmployee()
    {
        $data = $this->data;
        $url = $this->gongmall->employee->getContractUrl($data);
        $this->assertStringStartsWith('https://contract-qa.gongmall.com/url_contract.html', $url);

        //查询电签结果
        $data2['name'] = $data['name'];
        $data2['mobile'] = $data['mobile'];
        $data2['identity'] = $data['idNumber'];
        $result = $this->gongmall->employee->getContractStatus($data2);
        $this->assertArrayHasKey('success', $result);

        //修改员工银行卡
        $data3 = $data2;
        $data3['oldBankAccount'] = '6212253202006079587';
        $data3['newBankAccount'] = '6212253202006079587';
        $result = $this->gongmall->employee->syncBankAccount($data3);

        $this->assertArrayHasKey('success', $result);
        $this->assertArrayHasKey('errorCode', $result);
    }

    /**
     * Withdraw Tests.
     */
    public function testWithdraw()
    {
        $data = $this->data;
        $data['bankAccount'] = '6212253202006079587';
        $data['amount'] = 123.45;
        $data['requestId'] = time();
        $data['dateTime'] = date('YmdHis');

        $result = $this->gongmall->withdraw->getTaxInfo($data);
        $this->assertArrayHasKey('success', $result);
    }

    /**
     * Company Tests.
     */
    public function testCompany()
    {
        $result = $this->gongmall->company->getBalance();
        $this->assertArrayHasKey('success', $result);
    }

    /**
     * Push Tests.
     */
    public function testPush()
    {
        //回调示例
        $callback_str = 'appKey=58ead180d70a49048c8df010124fb9d7&bankName=%E4%B8%AD%E5%9B%BD%E5%B7%A5%E5%95%86%E9%93%B6%E8%A1%8C&extraParam=&identity=411423198309221234&mobile=18627000000&name=%E9%99%88%E4%BC%AF%E4%B9%90&nonce=f8d4a31e391f4fffabfb785d5cdc44e1&salaryAccount=6212253202006079587&sign=xxx&status=2&timestamp=1550055394039&workNumber=8096';
        parse_str($callback_str, $post);

        $this->expectException(\Exception::class);
        $result = $this->gongmall->push->parse($post);

        //回调示例
        $callback_str = 'appKey=58ead180d70a49048c8df010124fb9d7&bankName=%E4%B8%AD%E5%9B%BD%E5%B7%A5%E5%95%86%E9%93%B6%E8%A1%8C&extraParam=&identity=411423198309221234&mobile=18627000000&name=%E9%99%88%E4%BC%AF%E4%B9%90&nonce=f8d4a31e391f4fffabfb785d5cdc44e1&salaryAccount=6212253202006079587&sign=F2142A0AD77796FAC3328625AC8CCE38&status=2&timestamp=1550055394039&workNumber=8096';
        parse_str($callback_str, $post);

        $result = $this->gongmall->push->parse($post);

        $this->assertArrayHasKey('appKey', $result);
        $this->assertArrayHasKey('sign', $result);
    }
}