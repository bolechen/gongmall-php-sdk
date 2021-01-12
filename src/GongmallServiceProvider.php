<?php

/*
 * This file is part of the bolechen/gongmall-php-sdk.
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled.
 */

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
    public function register(Container $pimple): void
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

        $pimple['push'] = function ($pimple) {
            return new Push($pimple);
        };
    }
}
