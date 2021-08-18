<?php
/**
 * Created by PhpStorm.
 * User: 713uk13m
 * Date: 5/7/18
 * Time: 20:34
 */
if (!function_exists('get_pagination_number')) {
    /**
     * Function get_pagination_number
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-03-25 14:03
     *
     * @param $str
     *
     * @return int
     */
    function get_pagination_number($str)
    {
        $str = str_replace('trang-', '', $str);

        return intval($str);
    }
}
if (!function_exists('view_pagination')) {
    /**
     * Function view_pagination
     *
     * @param array $input_data
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 55:48
     */
    function view_pagination($input_data = array())
    {
        $common = new nguyenanhung\Classes\Helper\Common();

        return $common->viewPagination($input_data);
    }
}
