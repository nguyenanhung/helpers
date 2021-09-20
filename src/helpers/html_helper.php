<?php
/**
 * Created by PhpStorm.
 * User: 713uk13m
 * Date: 5/4/18
 * Time: 11:52
 */
if (!function_exists('get_json_item')) {
    /**
     * Function get_json_item
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-03-25 14:28
     *
     * @param string $json_string
     * @param string $item_output
     *
     * @return string|null
     */
    function get_json_item($json_string = '', $item_output = '')
    {
        return jsonItem($json_string, $item_output);
    }
}
if (!function_exists('clean_title')) {
    /**
     * Function clean_title
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-03-25 14:28
     *
     * @param string $str
     *
     * @return string
     */
    function clean_title($str = '')
    {
        $str = escapeHtml($str);
        $str = strip_tags($str);

        return trim($str);
    }
}
