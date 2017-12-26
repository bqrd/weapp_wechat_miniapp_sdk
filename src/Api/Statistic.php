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

class Statistic extends BaseApi
{
    public function getAbout($date)
    {
        $url = ApiUrl::STATISTIC_ABOUT;
        $param = array(
			'begin_date' => $date,
			'end_date' => $date,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    public function getVisitDaily($date)
    {
        $url = ApiUrl::STATISTIC_VISIT_DAILY;
        $param = array(
			'begin_date' => $date,
			'end_date' => $date,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    public function getVisitWeekly($begin_date, $end_date)
    {
        $url = ApiUrl::STATISTIC_VISIT_WEEKLY;
        $param = array(
			'begin_date' => $begin_date,
			'end_date' => $end_date,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    public function getVisitMonthly($begin_date, $end_date)
    {
        $url = ApiUrl::STATISTIC_VISIT_MONTHLY;
        $param = array(
			'begin_date' => $begin_date,
			'end_date' => $end_date,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    public function getDistribution($date)
    {
        $url = ApiUrl::STATISTIC_VISIT_DISTRIBUTION;
        $param = array(
			'begin_date' => $date,
			'end_date' => $date,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    public function getRetainDaily($date)
    {
        $url = ApiUrl::STATISTIC_VISIT_RETAIN_DAILY;
        $param = array(
			'begin_date' => $date,
			'end_date' => $date,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    public function getRetainWeekly($begin_date, $end_date)
    {
        $url = ApiUrl::STATISTIC_VISIT_RETAIN_WEEKLY;
        $param = array(
			'begin_date' => $begin_date,
			'end_date' => $end_date,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    public function getRetainMonthly($begin_date, $end_date)
    {
        $url = ApiUrl::STATISTIC_VISIT_RETAIN_WEEKLY;
        $param = array(
			'begin_date' => $begin_date,
			'end_date' => $end_date,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    public function getPage($date)
    {
        $url = ApiUrl::STATISTIC_VISIT_PAGE;
        $param = array(
			'begin_date' => $date,
			'end_date' => $date,
		);

        return $this->sendRequestWithToken($url, $param);
    }

    public function getUserFeature($begin_date, $end_date)
    {
        $url = ApiUrl::STATISTIC_VISIT_USERS_FEATURE;
        $param = array(
			'begin_date' => $begin_date,
			'end_date' => $end_date,
		);

        return $this->sendRequestWithToken($url, $param);
    }
}
