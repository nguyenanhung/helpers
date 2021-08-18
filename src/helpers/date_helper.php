<?php
/**
 * Created by PhpStorm.
 * User: hungna
 * Date: 8/9/2017
 * Time: 3:27 PM
 */
if (!function_exists('iso_8601_utc_time')) {
    /**
     * Function iso_8601_utc_time
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 17:38
     */
    function iso_8601_utc_time()
    {
        $common = new nguyenanhung\Classes\Helper\Common();

        return $common->zuluTime();
    }
}
