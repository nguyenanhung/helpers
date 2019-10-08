<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/8/19
 * Time: 15:27
 */
if (!function_exists('base64url_encode')) {
    /**
     * Function encode
     *
     * @param      $data
     * @param bool $usePadding
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/8/19 31:44
     */
    function base64url_encode($data, $usePadding = FALSE)
    {
        $encoded = strtr(base64_encode($data), '+/', '-_');

        return TRUE === $usePadding ? $encoded : rtrim($encoded, '=');
    }
}
if (!function_exists('base64url_decode')) {
    /**
     * Function base64url_decode
     *
     * @param $data
     *
     * @return false|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/8/19 33:29
     */
    function base64url_decode($data)
    {
        $decoded = base64_decode(strtr($data, '-_', '+/'), TRUE);
        if (FALSE === $decoded) {
            throw new InvalidArgumentException('Invalid data provided');
        }

        return $decoded;
    }
}
