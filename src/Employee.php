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
     * 通过合同模板id查询电签结果.
     *
     * @see https://opendoc.gongmall.com/merchant/dian-qian-he-tong/dian-qian-jie-guo-cha-xun-merchant.html
     *
     * @param array $params
     *
     * @throws \JsonException
     *
     * @return array
     */
    public function getContractStatus(array $params): array
    {
        return $this->request('/api/merchant/employee/getContractStatus', $params);
    }

    /**
     * 通过合同id查询电签结果.
     *
     * @see https://opendoc.gongmall.com/merchant/dian-qian-he-tong/get-contract-status-merchant.html
     *
     * @param array $params
     *
     * @throws \JsonException
     *
     * @return array
     */
    public function getContractStatusByContractId(array $params): array
    {
        return $this->request('/api/merchant/employee/getContractStatusByContractId', $params);
    }

    /**
     * 员工添加银行卡账号.
     *
     * @see https://opendoc.gongmall.com/merchant/dian-qian-he-tong/add-employee-bank-account.html
     *
     * @param array $params
     *
     * @throws \JsonException
     *
     * @return array
     */
    public function addBankAccount(array $params): array
    {
        return $this->request('/api/merchant/employee/addBankAccount', $params);
    }

    /**
     * 员工解除签署.
     *
     * @see https://opendoc.gongmall.com/merchant/dian-qian-he-tong/delete-employee-merchant.html
     *
     * @param array $params
     *
     * @throws \JsonException
     *
     * @return array
     */
    public function deleteContract(array $params): array
    {
        return $this->request('/api/merchant/employee/deleteContract', $params);
    }

    /**
     * 更新员工默认手机号或者账号.
     *
     * @see https://opendoc.gongmall.com/merchant/dian-qian-he-tong/gen-xin-account-merchant.html
     *
     * @param array $params
     *
     * @throws \JsonException
     *
     * @return array
     */
    public function updateEmployee(array $params): array
    {
        return $this->request('/api/merchant/employee/updateEmployee', $params);
    }
}
