<?php

/*
 * This file is part of the bqrd weapp package.
 *
 * (c) qinjb <qinjb@boqii.com> liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Bqrd\WeAppSdk\Api;

use Cache;

class BaseApi
{
    /**
     * appid.
     *
     * @var mixed
     */
    protected $appid;
    /**
     * secret.
     *
     * @var mixed
     */
    protected $secret;

    /**
     * __construct.
     *
     * @param mixed $appid
     * @param mixed $secret
     *
     * @return mixed
     */
    public function __construct($appid, $secret)
    {
        $this->appid = $appid;
        $this->secret = $secret;
    }

    /**
     * getAccessToken.
     *
     *
     *
     * @return mixed
     */
    public function getAccessToken()
    {
        $token = Cache::get($this->appid.'_token', false);
        if ($token) {
            return $token;
        }

        $url = ApiUrl::ACCESS_TOKEN;
        $param = array(
			'grant_type' => 'client_credential',
			'appid' => $this->appid,
			'secret' => $this->secret,
		);
        $res = $this->sendHttpRequest($url, $param, null, false);
        if (!isset($res['access_token'])) {
            throw new WeAppException($res['errcode'].':'.$res['errmsg'], $res['errcode']);
        }

        Cache::put($this->appid.'_token', $res['access_token'], $res['expires_in'] - 200);

        return $res['access_token'];
    }

    /**
     * sendRequestWithToken.
     *
     * @param mixed $url
     * @param mixed $body_param
     * @param mixed $is_post
     *
     * @return mixed
     */
    public function sendRequestWithToken($url, $body_param = null, $is_post = true)
    {
        $token = array(
			'access_token' => $this->getAccessToken(),
		);

        return $this->sendHttpRequest($url, $token, $body_param, $is_post);
    }

    /**
     * @param string $url
     * @param array  $url_param
     * @param array  $body_param
     * @param bool   $is_post
     *
     * @throws WeAppException
     *
     * @return mixed
     */
    public function sendHttpRequest($url, $url_param = null, $body_param = null, $is_post = true)
    {
        if ($url_param) {
            $url_param = '?'.http_build_query($url_param);
        }
        if ($body_param) {
            $body_param = json_encode($body_param, JSON_UNESCAPED_UNICODE);
        }
        $ch = curl_init($url.$url_param);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, 'CURLOPT_CONNECTTIMEOUT', 10);
        curl_setopt($ch, 'CURLOPT_TIMEOUT', 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($is_post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body_param);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $data = curl_exec($ch);
        curl_close($ch);
        $array_data = json_decode($data, true);
        if ($array_data) {
            if (isset($array_data['errcode']) && $array_data['errcode'] != 0) {
                throw new WeAppException($array_data['errcode'].':'.$array_data['errmsg'], $array_data['errcode']);
            }

            return $array_data;
        }

        return $data;
    }
}
