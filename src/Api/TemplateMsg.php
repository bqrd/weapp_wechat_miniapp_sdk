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

class TemplateMsg extends BaseApi
{
    /**
     * getListFromLib 
     * 
     * @param mixed $offset 
     * @param mixed $count 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getListFromLib($offset, $count)
    {
        $url = ApiUrl::TEMPLATE_MSG_LIST_FORM_LIB;
        $param = array(
			'offset' => $offset,
			'count' => $count,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    /**
     * getTempFromLib 
     * 
     * @param mixed $id 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getTempFromLib($id)
    {
        $url = ApiUrl::TEMPLATE_MSG_GET_FORM_LIB;
        $param = array(
			'id' => $id,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    /**
     * add 
     * 
     * @param mixed $id 
     * @param mixed $keyword_id_array 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function add($id, $keyword_id_array)
    {
        $url = ApiUrl::TEMPLATE_MSG_ADD;
        $param = array(
			'id' => $id,
			'keyword_id_list' => $keyword_id_array,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    /**
     * getList 
     * 
     * @param mixed $offset 
     * @param mixed $count 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function getList($offset, $count)
    {
        $url = ApiUrl::TEMPLATE_MSG_LIST;
        $param = array(
			'offset' => $offset,
			'count' => $count,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    /**
     * del 
     * 
     * @param mixed $template_id 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function del($template_id)
    {
        $url = ApiUrl::TEMPLATE_MSG_DEL;
        $param = array(
			'template_id' => $template_id,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    /**
     * send 
     * 
     * @param mixed $touser 
     * @param mixed $template_id 
     * @param mixed $form_id 
     * @param mixed $data 
     * @param mixed $page 
     * @param mixed $color 
     * @param mixed $emphasis_keyword 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function send($touser, $template_id, $form_id, $data, $page = null, $color = null, $emphasis_keyword = null)
    {
        $url = ApiUrl::TEMPLATE_MSG_SEND;
        $param = array(
			'touser' => $touser,
			'template_id' => $template_id,
			'page' => $page,
			'form_id' => $form_id,
			'data' => $data,
			'color' => $color,
			'emphasis_keyword' => $emphasis_keyword,
		);

        return $this->sendRequestWithToken($url, $param);
    }
}
