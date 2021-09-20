<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 2018-12-27
 * Time: 22:39
 */

namespace nguyenanhung\Classes\Helper;
if (!class_exists('nguyenanhung\Classes\Helper\Cookie')) {
    /**
     * Class Cookie
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class Cookie
    {
        /**
         * Function has
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-27 22:40
         *
         * @param $name
         *
         * @return array|bool
         */
        public static function has($name)
        {
            return static::exists($name);
        }

        /**
         * Function exists
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-27 22:40
         *
         * @param $name
         *
         * @return array|bool
         */
        public static function exists($name)
        {
            if (is_array($name)) {
                $output = [];
                foreach ($name as $item) {
                    $output[(string) $item] = isset($_COOKIE[(string) $item]);
                }

                return $output;
            }

            return isset($_COOKIE[(string) $name]);
        }

        /**
         * Function get
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-27 22:40
         *
         * @param $name
         *
         * @return array|null
         */
        public static function get($name): ?array
        {
            if (is_array($name)) {
                $output = [];
                foreach ($name as $item) {
                    $output[(string) $item] = self::exists($item) ? $_COOKIE[(string) $item] : NULL;
                }

                return $output;
            }

            return self::exists($name) ? $_COOKIE[(string) $name] : NULL;
        }
    }
}
