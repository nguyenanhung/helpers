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
     * @param array $array
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
        } else {
            // select an item to act as our pivot point, since list is unsorted first position is easiest
            $pivot = $array[0];
            // declare our two arrays to act as partitions
            $left  = array();
            $right = array();
            // loop and compare each item in the array to the pivot value, place item in appropriate partition
            for ($i = 1; $i < count($array); $i++) {
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
}
if (!function_exists('arrayToObject')) {
    /**
     * Function arrayToObject
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-01-02 10:58
     *
     * @param array $array
     * @param bool  $strToLower
     *
     * @return array|bool|\stdClass
     */
    function arrayToObject($array = array(), $strToLower = FALSE)
    {
        $common = new nguyenanhung\Classes\Helper\Common();

        return $common->arrayToObject($array, $strToLower);
    }
}
