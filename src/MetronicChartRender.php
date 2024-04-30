<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 15/01/2023
 * Time: 01:52
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\Basic\Miscellaneous\Miscellaneous;

if ( ! class_exists('nguyenanhung\Classes\Helper\MetronicChartRender')) {
    class MetronicChartRender implements ProjectInterface
    {
        use Version;

        /**
         * Function get_data_chart
         *
         * @param $item_list
         * @param $valueGet
         * @param $total
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/11/2021 26:39
         */
        public function get_data_chart($item_list, $valueGet, $total)
        {
            return (new Miscellaneous())->metronic_get_data_chart($item_list, $valueGet, $total);
        }

        /**
         * Function get_data_chart_report
         *
         * @param $item_list
         * @param $valueGet
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/11/2021 26:43
         */
        public function get_data_chart_report($item_list, $valueGet)
        {
            return (new Miscellaneous())->metronic_get_data_chart_report($item_list, $valueGet);
        }
    }
}
