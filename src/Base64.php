<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 06/03/2021
 * Time: 14:08
 */

namespace nguyenanhung\Classes\Helper;

use InvalidArgumentException;

if (!class_exists('nguyenanhung\Classes\Helper\Base64')) {
    /**
     * Class Base64
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class Base64 implements ProjectInterface
    {
        use Version;

        /**
         * Function superBase64Encode
         *
         * @param $input
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 06/03/2021 09:34
         */
        public static function superBase64Encode($input): string
        {
            $output = $input;
            $output = base64_encode($output);
            $output = strrev($output);
            $output = base64_encode($output);
            $output = base64_encode($output);

            return strrev($output);
        }

        /**
         * Function superBase64Decode
         *
         * @param $input
         *
         * @return false|string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 06/03/2021 09:38
         */
        public static function superBase64Decode($input)
        {
            $output = $input;
            $output = strrev($output);
            $output = base64_decode($output);
            $output = base64_decode($output);
            $output = strrev($output);

            return base64_decode($output);
        }

        /**
         * Function base64UrlEncode
         *
         * @param       $data
         * @param false $usePadding
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/22/2021 14:10
         */
        public static function base64UrlEncode($data, $usePadding = false): string
        {
            $encoded = strtr(base64_encode($data), '+/', '-_');

            return true === $usePadding ? $encoded : rtrim($encoded, '=');
        }

        /**
         * Function base64UrlDecode
         *
         * @param $data
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/22/2021 14:53
         */
        public static function base64UrlDecode($data): string
        {
            $decoded = base64_decode(strtr($data, '-_', '+/'), true);
            if (false === $decoded) {
                throw new InvalidArgumentException('Invalid data provided');
            }

            return $decoded;
        }
    }
}
