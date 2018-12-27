<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

if (!trait_exists('nguyenanhung\Classes\Helper\HtmlSupport')) {
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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-19 22:43
         *
         * @param $current
         * @param $previous
         * @param $id
         *
         * @return string
         */
        public function tableColor($current, $previous, $id)
        {
            if (isset($previous->$id)) {
                if ($previous->$id > $current->$id) {
                    $style = "<b style='color: red'>" . number_format($current->$id) . "</b>";
                } elseif ($previous->$id < $current->$id) {
                    $style = "<b style='color: blue'>" . number_format($current->$id) . "</b>";
                } else {
                    $style = "<b style='color: orange'>" . number_format($current->$id) . "</b>";
                }
            } else {
                $style = "<b style='color: green'>" . number_format($current->$id) . "</b>";
            }

            return $style;
        }
    }
}
