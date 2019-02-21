<?php

namespace Bolechen\Gongmall;

class Employee extends Api
{
    /**
     * 合同接入指南
     *
     * @link https://opendoc.gongmall.com/dian-qian-he-tong/jie-ru-zhi-nan.html
     * @return string
     **/
    public function getContractUrl(array $params)
    {
        return $this->contractUrl . "&data=" . base64_encode($this->employeeEncrypt($params));
    }

    /**
     * 查询电签结果
     *
     * @link https://opendoc.gongmall.com/dian-qian-he-tong/cha-xun-dian-qian-jie-guo.html
     * @return string
     **/
    public function getContractStatus(array $params)
    {
        return $this->request('/api/employee/getContractStatus', $params);
    }
}
