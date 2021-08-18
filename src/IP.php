<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/19
 * Time: 10:43
 */

namespace nguyenanhung\Classes\Helper;

use Exception;

if (!class_exists('nguyenanhung\Classes\Helper\IP')) {
    /**
     * Class IP
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class IP implements ProjectInterface
    {
        use Version;

        /**
         * Function getIPAddress
         *
         * @param false $convertToInteger
         *
         * @return false|int|string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 53:01
         */
        public static function getIPAddress($convertToInteger = FALSE)
        {
            $ip_keys = [
                0 => 'HTTP_X_FORWARDED_FOR',
                1 => 'HTTP_X_FORWARDED',
                2 => 'HTTP_X_IPADDRESS',
                3 => 'HTTP_X_CLUSTER_CLIENT_IP',
                4 => 'HTTP_FORWARDED_FOR',
                5 => 'HTTP_FORWARDED',
                6 => 'HTTP_CLIENT_IP',
                7 => 'HTTP_IP',
                8 => 'REMOTE_ADDR'
            ];
            foreach ($ip_keys as $key) {
                if (array_key_exists($key, $_SERVER) === TRUE) {
                    foreach (explode(',', $_SERVER[$key]) as $ip) {
                        $ip = trim($ip);
                        if ($convertToInteger === TRUE) {
                            return ip2long($ip);
                        }

                        return $ip;
                    }
                }
            }

            return FALSE;
        }

        /**
         * Function validateIP
         *
         * @param $ip
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 53:27
         */
        public static function validateIP($ip)
        {
            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                return FALSE;
            }

            return TRUE;
        }

        /**
         * Function validateIPV4
         *
         * @param $ip
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 53:52
         */
        public static function validateIPV4($ip)
        {
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === FALSE) {
                return FALSE;
            }

            return TRUE;
        }

        /**
         * Function validateIPV6
         *
         * @param $ip
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 54:15
         */
        public static function validateIPV6($ip)
        {
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === FALSE) {

                return FALSE;
            }

            return TRUE;
        }

        /**
         * Get Region from IP
         *
         * @param string $ip
         * @param string $apiToken
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 11/6/19 49:11
         */
        public static function getRegion($ip = '', $apiToken = '')
        {
            if (empty($ip)) {
                return FALSE;
            }
            try {
                $url      = 'https://ipinfo.io/' . $ip;
                $params   = array('token' => $apiToken);
                $endpoint = $url . '?' . http_build_query($params);
                $curl     = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL            => $endpoint,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_ENCODING       => "",
                    CURLOPT_MAXREDIRS      => 10,
                    CURLOPT_TIMEOUT        => 30,
                    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST  => "GET",
                    CURLOPT_HTTPHEADER     => array(),
                ));

                $response = curl_exec($curl);
                $err      = curl_error($curl);
                curl_close($curl);
                if ($err) {
                    $message = "cURL Error #:" . $err;
                    if (function_exists('log_message')) {
                        log_message('error', $message);
                    }

                    return FALSE;
                } else {
                    $result = json_decode($response, TRUE);
                    if (isset($result['region'])) {
                        return $result['region'];
                    }
                }

                return FALSE;
            }
            catch (Exception $e) {
                $message = 'Code: ' . $e->getCode() . ' - File: ' . $e->getFile() . ' - Line: ' . $e->getLine() . ' - Message: ' . $e->getMessage();
                if (function_exists('log_message')) {
                    log_message('error', $message);
                }

                return FALSE;
            }
        }

        /**
         * Get IP Information
         *
         * @param string $ip
         *
         * @return bool|string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 12:29
         */
        public static function getIpInformation($ip = '')
        {
            if (empty($ip)) {
                $ip = static::getIPAddress();
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
}
