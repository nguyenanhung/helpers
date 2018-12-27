<?php
if (!function_exists('jsonItem')) {
    /**
     * Function jsonItem
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-17 01:31
     *
     * @param string $json_string
     * @param string $item_output
     *
     * @return string|null
     */
    function jsonItem($json_string = '', $item_output = '')
    {
        $result      = json_decode(trim($json_string));
        $item_output = trim($item_output);
        if ($result !== NULL) {
            if (isset($result->$item_output)) {
                return trim($result->$item_output);
            }
        }

        return NULL;
    }
}
if (!function_exists('isJson')) {
    /**
     * Function isJson
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-17 01:31
     *
     * @param string $string
     *
     * @return bool
     */
    function isJson($string = '')
    {
        json_decode($string);

        return (json_last_error() == JSON_ERROR_NONE);
    }
}
