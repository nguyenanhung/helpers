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

if (!class_exists('nguyenanhung\Classes\Helper\MetronicChartRender')) {
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
            $dataChart = '';
            if (count($item_list) > 0) {
                $dataChart .= '[';
                foreach ($item_list as $key => $value) {
                    $dataChart .= '{' . '"country" : ' . '"' . $value->$valueGet . '", ';
                    $dataChart .= '"visits" : ' . $value->sl . ', ';
                    $dataChart .= '"color" : ' . '"#FF9E01"';
                    if ($key === count($item_list) - 1) {
                        $dataChart .= '}';
                    } else {
                        $dataChart .= '}, ';
                    }
                }
                if ($total) {
                    $dataChart .= ', {"country" : "Total", "visits" : ' . $total . ', "color" : "#0D52D1" }';
                }
                $dataChart .= ']';
            } else {
                $dataChart = '[]';
            }

            return $dataChart;
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
            $dataChart = '';
            if (count($item_list) > 0) {
                $dataChart .= '[';
                foreach ($item_list as $key => $value) {
                    $dataChart .= '{' . '"country" : ' . '"' . date('d-m-Y', strtotime($value->date)) . '", ';
                    $dataChart .= '"visits" : ' . $value->$valueGet . ', ';
                    $dataChart .= '"color" : ' . '"#FF9E01"';
                    if ($key === count($item_list) - 1) {
                        $dataChart .= '}';
                    } else {
                        $dataChart .= '}, ';
                    }
                }
                $dataChart .= ']';
            } else {
                $dataChart = '[]';
            }

            return $dataChart;
        }
    }
}
