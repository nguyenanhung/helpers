<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/18/2021
 * Time: 09:24
 */

namespace nguyenanhung\Classes\Helper;

use DateTime;
use DateTimeZone;
use Exception;

if (!class_exists('nguyenanhung\Classes\Helper\Common')) {
    /**
     * Class DateAndTime
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class DateAndTime
    {
        /**
         * Function zuluTime
         *
         * @return string|null
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 25:38
         */
        public static function zuluTime()
        {
            try {
                $dateUTC = new DateTime("now", new DateTimeZone("UTC"));

                return $dateUTC->format('Y-m-d\TH:i:s\Z');
            }
            catch (Exception $e) {
                return NULL;
            }
        }
    }
}
