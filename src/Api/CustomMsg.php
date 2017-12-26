<?php

/*
 * This file is part of the bqrd weapp package.
 *
 * (c) qinjb <qinjb@boqii.com> liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Bqrd\OpenApi\Api;

class CustomMsg extends BaseApi
{
    public function send($touser, $msgtype, $content_array)
    {
        $url = ApiUrl::CUSTOM_MSG_SEND;
        $param = array(
			'touser' => $touser,
			'msgtype' => $msgtype,
			$msgtype => $content_array,
		);

        return $this->sendRequestWithToken($url, $param);
    }
}
