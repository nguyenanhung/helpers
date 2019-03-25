<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 2019-03-25
 * Time: 14:36
 */
if (!function_exists('dump')) {
    /**
     * Function dump
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-03-25 14:37
     *
     * @param string $str
     */
    function dump($str = '')
    {
        echo "<pre>";
        print_r($str);
        echo "</pre>";
    }
}
if (!function_exists('isEmpty')) {
    /**
     * Function isEmpty
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-03-25 14:37
     *
     * @param string $input
     *
     * @return bool
     */
    function isEmpty($input = '')
    {
        $common = new \nguyenanhung\Classes\Helper\Common();
        $result = $common->isEmpty($input);

        return $result;
    }
}