<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use Bolechen\Gongmall\Gongmall;

$dotenv = \Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

class GongmallApiTest extends TestCase
{
    public $gongmall;
    public $data = [];

    public function setUp()
    {
        parent::setUp();

        $this->gongmall = new Gongmall([
            'apiKey' => env('GONGMALL_API_KEY'),
            'apiSecret' => env('GONGMALL_API_SECRET'),
            'contractUrl' => env('GONGMALL_SIGN_URL'),

            'debug' => false, // 输出日志
            'sandbox' => true, //沙盒

            'log' => [
                'name' => 'gongmall',
                'file' => __DIR__ .'gongmall.log',
                'level'      => 'debug',
                'permission' => 0777,
            ]
        ]);

        $data['name'] = '张三';
        $data['mobile'] = '18627000000';
        $data['workNumber'] = rand(1, 9999);
        $data['certificateType'] = 1;
        $data['idNumber'] = '411423198309221234';
        $data['identity'] = '411423198309221234';

        $this->data = $data;
    }

    /**
     * Employee Tests
     *
     * @return void
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
    }

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

    public function testCompany()
    {
        $result = $this->gongmall->company->getBalance();
        $this->assertArrayHasKey('success', $result);
    }
}
