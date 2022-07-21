<?php
/**
 * Project td-sms-feature-sdk.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/9/18
 * Time: 17:00
 */

namespace nguyenanhung\Classes\Helper;

use stdClass;
use nguyenanhung\Libraries\Password\Hash;
use nguyenanhung\Libraries\DateAndTime\DateAndTime;
use nguyenanhung\Libraries\ArrayHelper\ArrayHelper;
use nguyenanhung\Libraries\URI\URI;

if (!class_exists('nguyenanhung\Classes\Helper\Utils')) {
    /**
     * Class Utils
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class Utils implements ProjectInterface
    {
        use Version;

        /**
         * Header Redirect
         *
         * Header redirect in two flavors
         * For very fine grained control over headers, you could use the Output
         * Library's set_header() function.
         *
         * @param string $uri       URL
         * @param string $method    Redirect method
         *                          'auto', 'location' or 'refresh'
         * @param int    $code      HTTP Response status code
         *
         * @return    void
         *
         * @copyright https://www.codeigniter.com/
         */
        public static function redirect($uri = '', $method = 'auto', $code = null): void
        {
            URI::redirect($uri, $method, $code);
        }

        /**
         * Function isJson
         *
         * @param $string
         *
         * @return bool
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/26/18 10:50
         *
         */
        public static function isJson($string = ''): bool
        {
            return isJson($string);
        }

        /**
         * Function arrayToObject
         *
         * @param array $data
         *
         * @return array|false|\stdClass
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/22/2021 49:55
         */
        public static function arrayToObject($data = array())
        {
            return ArrayHelper::arrayToObject($data);
        }

        /**
         * Function objectFormat
         *
         * @param string|array|object $data
         *
         * @return array|bool|mixed|\stdClass|string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/26/18 10:51
         *
         */
        public static function objectFormat($data = '')
        {
            if (is_object($data)) {
                return $data;
            }
            if (is_array($data)) {
                return static::arrayToObject($data);
            }
            if (static::isJson($data)) {
                return json_decode($data);
            }

            return new stdClass();
        }

        /**
         * Function commonMessageTelco
         *
         * @param string $content
         * @param string $type
         * @param string $count_type
         *
         * @return false|float|int|string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 52:42
         */
        public static function commonMessageTelco($content = '', $type = 'length', $count_type = 'default')
        {
            if ($type === 'length') {
                return strlen($content);
            }
            if ($type === 'count' && $count_type === 'default') {
                return ceil(strlen($content) / 160);
            }

            return $content;
        }

        /**
         * Function expireTime
         *
         * @param int $duration
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2019-07-15 10:57
         *
         */
        public static function expireTime($duration = 1): string
        {
            return DateAndTime::expireTime($duration);
        }

        /**
         * Function generateHashValue
         *
         * @param string $str
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/18/18 03:04
         *
         */
        public static function generateHashValue($str = ''): string
        {
            return Hash::generateHashValue($str);
        }

        /**
         * Function generateUserPasswordRandom
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/19/18 10:08
         *
         */
        public static function generateUserPasswordRandom(): string
        {
            return Hash::generateUserPasswordRandom();
        }

        /**
         * Function generateUserToken
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/19/18 10:08
         *
         */
        public static function generateUserToken(): string
        {
            return Hash::generateUserToken();
        }

        /**
         * Function generateUserSaltKey
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/19/18 10:08
         *
         */
        public static function generateUserSaltKey(): string
        {
            return Hash::generateUserSaltKey();
        }

        /**
         * Function generateRequestId
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 17:15
         *
         */
        public static function generateRequestId(): string
        {
            return Hash::generateRequestId();
        }

        /**
         * Function generateVinaRequestId
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-06 22:04
         *
         */
        public static function generateVinaRequestId(): string
        {
            return Hash::generateVinaRequestId();
        }

        /**
         * Function generateOTPCode
         *
         * @param int $length
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 17:16
         *
         */
        public static function generateOTPCode($length = 6): string
        {
            return Hash::generateOTPCode($length);
        }

        /**
         * Function generateOTPExpireTime
         *
         * @param int $hour
         *
         * @return string
         * @throws \Exception
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-06 16:03
         *
         */
        public static function generateOTPExpireTime($hour = 4): string
        {
            return Hash::generateOTPExpireTime($hour);
        }

        /**
         * Function zuluTime
         *
         * @return string
         * @throws \Exception
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 35:16
         */
        public static function zuluTime(): string
        {
            return DateAndTime::zuluTime();
        }
    }
}
