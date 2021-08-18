<?php
if (!function_exists('jsonItem')) {
    /**
     * Function jsonItem
     *
     * @param string $json_string
     * @param string $item_output
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 54:52
     */
    function jsonItem($json_string = '', $item_output = '')
    {
        return nguyenanhung\Classes\Helper\Json::jsonItem($json_string, $item_output);
    }
}
if (!function_exists('isJson')) {
    /**
     * Function isJson
     *
     * @param string $string
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 54:50
     */
    function isJson($string = '')
    {
        return nguyenanhung\Classes\Helper\Json::isJson($string);
    }
}
