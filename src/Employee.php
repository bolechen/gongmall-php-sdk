<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Bolechen\Gongmall;

class Employee extends Api
{
    /**
     * 合同接入指南.
     *
     * @see   https://opendoc.gongmall.com/dian-qian-he-tong/jie-ru-zhi-nan.html
     *
     * @return string
     */
    public function getContractUrl(array $params)
    {
        return $this->contractUrl.'&data='.base64_encode($this->employeeEncrypt($params));
    }

    /**
     * 查询电签结果.
     *
     * @see   https://opendoc.gongmall.com/dian-qian-he-tong/cha-xun-dian-qian-jie-guo.html
     *
     * @return array
     */
    public function getContractStatus(array $params)
    {
        return $this->request('/api/employee/getContractStatus', $params);
    }

    /**
     * 修改员工银行卡
     *
     * @see   https://opendoc.gongmall.com/shi-shi-ti-xian/xiu-gai-yin-hang-ka.html
     *
     * @return array
     */
    public function syncBankAccount(array $params)
    {
        return $this->request('/api/employee/syncBankAccount', $params);
    }
}
