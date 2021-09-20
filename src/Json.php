<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/18/2021
 * Time: 09:19
 */

namespace nguyenanhung\Classes\Helper;

if (!class_exists('nguyenanhung\Classes\Helper\Json')) {
    /**
     * Class Json
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class Json
    {
        /**
         * Function jsonItem
         *
         * @param string $json_string
         * @param string $item_output
         *
         * @return null|string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:08
         *
         */
        public static function jsonItem($json_string = '', $item_output = ''): ?string
        {
            $result      = json_decode(trim($json_string));
            $item_output = trim($item_output);
            if (($result !== null) && isset($result->$item_output)) {
                return trim($result->$item_output);
            }

            return NULL;
        }

        /**
         * Function isJson
         *
         * @param string $json
         *
         * @return bool TRUE or FALSE
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 09:39
         *
         */
        public static function isJson($json = ''): bool
        {
            $decode = json_decode(trim($json));

            return !($decode === null);
        }
    }
}
