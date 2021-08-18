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
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 18:27
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
if (!function_exists('super_base64_encode')) {
    /**
     * Function super_base64_encode
     *
     * @param $input
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 19:36
     */
    function super_base64_encode($input)
    {
        return nguyenanhung\Classes\Helper\Base64::superBase64Encode($input);
    }
}
if (!function_exists('super_base64_decode')) {
    /**
     * Function super_base64_decode
     *
     * @param $input
     *
     * @return false|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 20:11
     */
    function super_base64_decode($input)
    {
        return nguyenanhung\Classes\Helper\Base64::superBase64Decode($input);
    }
}
