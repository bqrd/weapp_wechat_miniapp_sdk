<?php

/*
 * This file is part of the bqrd weapp package.
 *
 * (c) qinjb <qinjb@boqii.com> liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Bqrd\WeAppSdk;

use Bqrd\WeAppSdk\Api\CustomMsg;
use Bqrd\WeAppSdk\Api\QRCode;
use Bqrd\WeAppSdk\Api\SessionKey;
use Bqrd\WeAppSdk\Api\Statistic;
use Bqrd\WeAppSdk\Api\TemplateMsg;
use Bqrd\WeAppSdk\Api\WeAppException;

class WeApp
{
    /**
     * appid.
     *
     * @var mixed
     */
    private $appid;
    /**
     * secret.
     *
     * @var mixed
     */
    private $secret;
    /**
     * instance.
     *
     * @var mixed
     */
    private $instance;

    /**
     * __construct.
     *
     * @param mixed $appid
     * @param mixed $secret
     *
     * @return mixed
     */
    public function __construct(string $appid = '', string $secret = '')
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
    public function getSessionKey(string $code = '')
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

    /**
     * 解密decrypt.
     *
     * @param string $str        密文
     * @param string $sessionKey sessionKey
     * @param string $iv         IV
     *
     * @return mixed
     */
    public function decrypt(string $str = '', string $sessionKey = '', string $iv = '')
    {
        if (strlen($sessionKey) != 24) {
            throw new WeAppException('IllegalSessionKey');
        }

        $aesKey = base64_decode($sessionKey);

        if (strlen($iv) != 24) {
            throw new WeAppException('IllegalIv');
        }
        $aesIV = base64_decode($iv);

        $aesCipher = base64_decode($str);

        $result = openssl_decrypt($aesCipher, 'AES-128-CBC', $aesKey, 1, $aesIV);

        $dataObj = json_decode($result);
        if (json_last_error() != JSON_ERROR_NONE) {
            throw new WeAppException('IllegalBuffer' . json_last_error_msg());
        }

        if ($dataObj->watermark->appid != $this->appid) {
            throw new WeAppException('IllegalBuffer');
        }

        return $result;
    }
}
