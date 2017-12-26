<?php

/*
 * This file is part of the bqrd weapp package.
 *
 * (c) qinjb <qinjb@boqii.com> liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Bqrd\OpenApi;

use Bqrd\OpenApi\Api\CustomMsg;
use Bqrd\OpenApi\Api\QRCode;
use Bqrd\OpenApi\Api\SessionKey;
use Bqrd\OpenApi\Api\Statistic;
use Bqrd\OpenApi\Api\TemplateMsg;

class WeApp
{
    private $appid;
    private $secret;
    private $instance;

    public function __construct($appid, $secret)
    {
        $this->appid = $appid;
        $this->secret = $secret;
        $this->instance = [];
    }

    /**
     * @param $code
     *
     * @return array sessionkey相关数组
     */
    public function getSessionKey($code)
    {
        if (!isset($this->instance['sessionkey'])) {
            $this->instance['sessionkey'] = new SessionKey($this->appid, $this->secret);
        }

        return $this->instance['sessionkey']->get($code);
    }

    /**
     * @return TemplateMsg 模板消息对象
     */
    public function getTemplateMsg()
    {
        if (!isset($this->instance['template'])) {
            $this->instance['template'] = new TemplateMsg($this->appid, $this->secret);
        }

        return $this->instance['template'];
    }

    /**
     * @return QRCode 二维码对象
     */
    public function getQRCode()
    {
        if (!isset($this->instance['qrcode'])) {
            $this->instance['qrcode'] = new QRCode($this->appid, $this->secret);
        }

        return $this->instance['qrcode'];
    }

    /**
     * @return Statistic 数据统计对象
     */
    public function getStatistic()
    {
        if (!isset($this->instance['statistic'])) {
            $this->instance['statistic'] = new Statistic($this->appid, $this->secret);
        }

        return $this->instance['statistic'];
    }

    /**
     * @return CustomMsg 客户消息对象
     */
    public function getCustomMsg()
    {
        if (!isset($this->instance['custommsg'])) {
            $this->instance['custommsg'] = new CustomMsg($this->appid, $this->secret);
        }

        return $this->instance['custommsg'];
    }
}
