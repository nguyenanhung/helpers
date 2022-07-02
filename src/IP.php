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

use nguyenanhung\Libraries\IP\IP as BaseIP;

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
            return (new BaseIP())->getIpAddress($convertToInteger);
        }

        /**
         * Function validateIP
         *
         * @param $ip
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/20/2021 37:26
         */
        public static function validateIP($ip): bool
        {
            return (new BaseIP())->ipValidate($ip);
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
        public static function validateIPV4($ip): bool
        {
            return (new BaseIP())->ipValidateV4($ip);
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
        public static function validateIPV6($ip): bool
        {
            return (new BaseIP())->ipValidateV6($ip);
        }

        /**
         * Function getRegion
         *
         * @param string $ip
         * @param string $apiToken
         *
         * @return false|mixed
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/20/2021 47:58
         */
        public static function getRegion($ip = '', $apiToken = '')
        {
            return (new BaseIP())->getRegionOfIp($ip, $apiToken);
        }

        /**
         * Function getIpInformation
         *
         * @param string $ip
         *
         * @return string|null
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/21/2021 39:53
         */
        public static function getIpInformation($ip = '')
        {
            return (new BaseIP())->ipInfo($ip);
        }
    }
}
