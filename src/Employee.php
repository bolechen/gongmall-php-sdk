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
     * @param array $params
     *
     * @return string
     */
    public function getContractUrl(array $params): string
    {
        return $this->contractUrl.'&data='.base64_encode($this->employeeEncrypt($params));
    }

    /**
     * 查询电签结果（废弃）.
     *
     * @see   https://opendoc.gongmall.com/dian-qian-he-tong/cha-xun-dian-qian-jie-guo.html
     *
     * @param array $params
     *
     * @return array
     *
     * @deprecated  官方标记为已废弃，使用 getContractStatusV2 替代
     */
    public function getContractStatus(array $params): array
    {
        return $this->request('/api/employee/getContractStatus', $params);
    }

    /**
     * 查询电签结果.
     *
     * @see   https://opendoc.gongmall.com/dian-qian-he-tong/cha-xun-dian-qian-jie-guo-v2.html
     *
     * @param array $params
     *
     * @return array
     */
    public function getContractStatusV2(array $params): array
    {
        return $this->request('/api/employee/getContractStatusV2', $params);
    }

    /**
     * 修改员工银行卡
     *
     * @see   https://opendoc.gongmall.com/shi-shi-ti-xian/xiu-gai-yin-hang-ka.html
     *
     * @param array $params
     *
     * @return array
     */
    public function syncBankAccount(array $params): array
    {
        return $this->request('/api/employee/v2/syncBankAccount', $params);
    }
}
