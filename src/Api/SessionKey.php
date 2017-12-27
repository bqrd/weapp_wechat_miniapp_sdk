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

class SessionKey extends BaseApi
{
    /**
     * 使用code 换取 openid 和 session_key.
     *
     * @param mixed $code
     *
     * @return mixed
     */
    public function get($code)
    {
        $url = ApiUrl::SESSION_KEY;
        $param = array(
			'appid' => $this->appid,
			'secret' => $this->secret,
			'js_code' => $code,
			'grant_type' => 'authorization_code',
		);

        return $this->sendHttpRequest($url, $param, null, false);
    }
}
