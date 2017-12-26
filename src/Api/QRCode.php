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

class QRCode extends BaseApi
{
    /**
     * getQRCodeA 
     * 
     * @param mixed $path 
     * @param mixed $width 
     * @param mixed $auto_color 
     * @param mixed $line_color 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getQRCodeA($path, $width = null, $auto_color = null, $line_color = null)
    {
        $url = ApiUrl::GET_APP_CODE_A;
        $param = array(
			'path' => $path,
			'width' => $width,
			'auto_color' => $auto_color,
			'line_color' => $line_color,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    /**
     * getQRCodeB 
     * 
     * @param mixed $scene 
     * @param mixed $page 
     * @param mixed $width 
     * @param mixed $auto_color 
     * @param mixed $line_color 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getQRCodeB($scene, $page, $width = null, $auto_color = null, $line_color = null)
    {
        $url = ApiUrl::GET_APP_CODE_B;
        $param = array(
			'scene' => $scene,
			'page' => $page,
			'width' => $width,
			'auto_color' => $auto_color,
			'line_color' => $line_color,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    /**
     * getQRCodeC 
     * 
     * @param mixed $path 
     * @param mixed $width 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getQRCodeC($path, $width = null)
    {
        $url = ApiUrl::GET_QR_CODE_C;
        $param = array(
			'path' => $path,
			'width' => $width,
		);

        return $this->sendRequestWithToken($url, $param);
    }
}
