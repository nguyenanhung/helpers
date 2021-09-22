<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 2019-01-02
 * Time: 10:55
 */
if (!function_exists('arrayQuickSort')) {
    /**
     * Function arrayQuickSort
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-01-02 10:56
     *
     * @param array|mixed $array
     *
     * @return array
     */
    function arrayQuickSort($array = array())
    {
        // find array size
        $length = count($array);
        // base case test, if array of length 0 then just return array to caller
        if ($length <= 1) {
            return $array;
        }

        // select an item to act as our pivot point, since list is unsorted first position is easiest
        $pivot = $array[0];
        // declare our two arrays to act as partitions
        $left  = array();
        $right = array();
        // loop and compare each item in the array to the pivot value, place item in appropriate partition
        for ($i = 1; $i < $length; $i++) {
            if ($array[$i] < $pivot) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }

        // use recursion to now sort the left and right lists
        return array_merge(arrayQuickSort($left), array(
            $pivot
        ), arrayQuickSort($right));
    }
}
if (!function_exists('arrayToObject')) {
    /**
     * Function arrayToObject
     *
     * @param array|mixed $array
     * @param bool        $strToLower
     *
     * @return array|bool|\stdClass
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 23:40
     */
    function arrayToObject($array = array(), $strToLower = false)
    {
        $common = new nguyenanhung\Classes\Helper\Common();

        return $common->arrayToObject($array, $strToLower);
    }
}
