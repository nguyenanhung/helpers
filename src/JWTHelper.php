<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/19
 * Time: 10:49
 */

namespace nguyenanhung\Classes\Helper;

if (!class_exists('nguyenanhung\Classes\Helper\JWTHelper')) {
    /**
     * Class JWTHelper
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class JWTHelper implements ProjectInterface
    {
        use Version;

        /**
         * Function getAuthorizationHeader
         *
         * @return string|null
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 11/6/19 50:26
         */
        public static function getAuthorizationHeader()
        {
            $headers = NULL;
            if (isset($_SERVER['Authorization'])) {
                $headers = trim($_SERVER["Authorization"]);
            } elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
                $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
            } elseif (function_exists('apache_request_headers')) {
                $requestHeaders = apache_request_headers();
                // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
                $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
                if (isset($requestHeaders['Authorization'])) {
                    $headers = trim($requestHeaders['Authorization']);
                }
            }

            return $headers;
        }

        /**
         * Function getBearerToken
         *
         * @return mixed|null
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 11/6/19 50:30
         */
        public static function getBearerToken()
        {
            $headers = static::getAuthorizationHeader();
            // HEADER: Get the access token from the header
            if (!empty($headers)) {
                if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                    return $matches[1];
                }
            }

            return NULL;
        }
    }
}
