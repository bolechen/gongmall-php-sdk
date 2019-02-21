<?php

namespace Bolechen\Gongmall;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class GongmallServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['employee'] = function ($pimple) {
            return new Employee($pimple);
        };

        $pimple['withdraw'] = function ($pimple) {
            return new Withdraw($pimple);
        };

        $pimple['company'] = function ($pimple) {
            return new Company($pimple);
        };
    }
}
