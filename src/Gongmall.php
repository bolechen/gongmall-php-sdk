<?php

namespace Bolechen\Gongmall;

use Hanson\Foundation\Foundation;

class Gongmall extends Foundation
{
    public function __construct($config)
    {
        parent::__construct($config);
        $this->employee = new Employee($this->getConfig());
    }
}
