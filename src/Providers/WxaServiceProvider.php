<?php

/*
 * This file is part of the bqrd weapp package.
 *
 * (c) qinjb <qinjb@boqii.com> liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Bqrd\WeAppSdk\Providers;

use Bqrd\WeAppSdk\WeApp;
use Illuminate\Support\ServiceProvider;

class WxaServiceProvider extends ServiceProvider
{
    /**
     * defer.
     *
     * @var mixed
     */
    protected $defer = true;

    /**
     * register.
     *
     *
     *
     * @return mixed
     */
    public function register()
    {
        $this->app->singleton(WeApp::class, function ($app) {
            $app->configure('openapi-wechat-miniapp-sdk');
            $config = $app->make('config')->get('openapi-wechat-miniapp-sdk');

            return new WeApp($config['appId'], $config['appSecret']);
        });
    }

    /**
     * provides.
     *
     *
     *
     * @return mixed
     */
    public function provides()
    {
        return [WeApp::class];
    }
}
