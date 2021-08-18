<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

use nguyenanhung\Classes\Helper\IP;

if (!function_exists('getIPAddress')) {
    /**
     * Function getIpAddress
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-25 11:09
     *
     * @param bool $convertToInteger
     *
     * @return bool|int|string
     */
    function getIPAddress($convertToInteger = FALSE)
    {
        return IP::getIPAddress($convertToInteger);
    }
}
if (!function_exists('validateIP')) {
    /**
     * Function validateIP
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 20:47
     *
     * @param $ip
     *
     * @return bool
     */
    function validateIP($ip)
    {
        return IP::validateIP($ip);
    }
}
if (!function_exists('validateIPV4')) {
    /**
     * Function validateIPV4
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 20:49
     *
     * @param $ip
     *
     * @return bool
     */
    function validateIPV4($ip)
    {
        return IP::validateIPV4($ip);
    }
}
if (!function_exists('validateIPV6')) {
    /**
     * Function validateIPV6
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 20:49
     *
     * @param $ip
     *
     * @return bool
     */
    function validateIPV6($ip)
    {
        return IP::validateIPV6($ip);
    }
}
if (!function_exists('getIpInformation')) {
    /**
     * Function getIpInformation
     *
     * @param string $ip
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 13:37
     */
    function getIpInformation($ip = '')
    {
        return IP::getIpInformation($ip);
    }
}
