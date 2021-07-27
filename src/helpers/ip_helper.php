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
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 20:52
     *
     * @param string $ip
     *
     * @return bool|string JSON string
     */
    function getIpInformation($ip = '')
    {
        if (empty($ip)) {
            $ip = getIPAddress();
        }
        try {
            $endpoint = 'http://ip-api.com/json/' . $ip;
            $curl     = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL            => $endpoint,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "GET",
                CURLOPT_POSTFIELDS     => "",
                CURLOPT_HTTPHEADER     => array(),
            ));
            $response = curl_exec($curl);
            $err      = curl_error($curl);
            curl_close($curl);
            if ($err) {
                $response = "cURL Error #:" . $err;
            }

            return $response;
        }
        catch (Exception $e) {
            return 'Error File: ' . $e->getFile() . ' - Line: ' . $e->getLine() . ' - Code: ' . $e->getCode() . ' - Message: ' . $e->getMessage();
        }
    }
}
