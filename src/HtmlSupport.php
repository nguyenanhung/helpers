<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\HTML\Common as HtmlCommon;

if ( ! trait_exists('nguyenanhung\Classes\Helper\HtmlSupport')) {
    /**
     * Trait HtmlSupport
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    trait HtmlSupport
    {
        /**
         * Function tableColor
         *
         * @param $current
         * @param $previous
         * @param $id
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-19 22:43
         *
         */
        public function tableColor($current, $previous, $id): string
        {
            return (new HtmlCommon())->tableColor($current, $previous, $id);
        }
    }
}
