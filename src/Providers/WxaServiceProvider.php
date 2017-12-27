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
        if (strpos($this->app->version(), 'Lumen') !== false) {
            $this->app->singleton(WeApp::class, function ($app) {
                $app->configure('weapp');
                $config = $app->make('config')->get('weapp');

                return new WeApp($config['appId'], $config['appSecret']);
            });
        } else {
            $this->app->singleton(WeApp::class, function ($app) {
                return new WeApp(config('weapp.appId'), config('weapp.appSecret'));
            });
        }
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
