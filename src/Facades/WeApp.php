<?php

/*
 * This file is part of the bqrd weapp package.
 *
 * (c) qinjb <qinjb@boqii.com> liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Bqrd\OpenApi\Facades;

use Illuminate\Support\Facades\Facade;
use Bqrd\OpenApi\WeApp as OpenApiWeApp;

class WeApp extends Facade
{
    /**
     * getFacadeAccessor.
     *
     * @static
     *
     * @return mixed
     */
    public static function getFacadeAccessor()
    {
        return OpenApiWeApp::class;
    }
}
