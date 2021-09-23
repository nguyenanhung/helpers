<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 2018-12-27
 * Time: 20:26
 */

namespace nguyenanhung\Classes\Helper;

if (!trait_exists('nguyenanhung\Classes\Helper\Version')) {
    /**
     * Trait Version
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    trait Version
    {
        /**
         * Function getVersion
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 36:14
         */
        public function getVersion(): string
        {
            return self::VERSION;
        }
    }
}
