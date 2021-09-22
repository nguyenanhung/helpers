<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\DateAndTime\DateAndTime;

if (!class_exists('nguyenanhung\Classes\Helper\Filter')) {
    /**
     * Class Filter
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class Filter implements ProjectInterface
    {
        use Version;

        /**
         * Function filterInputDataIsArray
         *
         * @param array $inputData
         * @param array $requireData
         *
         * @return bool
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-18 22:37
         *
         */
        public static function filterInputDataIsArray($inputData = [], $requireData = []): bool
        {
            if (empty($inputData) || empty($requireData)) {
                return false;
            }
            if (count($requireData) <= 0 || count($inputData) <= 0) {
                return false;
            }
            if (!is_array($requireData) || !is_array($inputData)) {
                return false;
            }
            foreach ($requireData as $params) {
                if (!array_key_exists($params, $inputData)) {
                    return false;
                }
            }

            return true;
        }

        /**
         * Function filterRequireInputDataIsNull
         *
         * @param array $inputData
         * @param array $requireData
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 2/11/20 22:06
         */
        public static function filterRequireInputDataIsNull($inputData = [], $requireData = []): bool
        {
            if (empty($inputData) || empty($requireData)) {
                return false;
            }
            if (count($requireData) <= 0 || count($inputData) <= 0) {
                return false;
            }
            if (!is_array($requireData) || !is_array($inputData)) {
                return false;
            }
            foreach ($requireData as $params) {
                if (!array_key_exists($params, $inputData)) {
                    return false;
                }

                if ($inputData[$params] === null) {
                    return false;
                }
            }

            return true;
        }

        /**
         * Function filterRequireInputDataIsEmpty
         *
         * @param array $inputData
         * @param array $requireData
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 2/11/20 22:28
         */
        public static function filterRequireInputDataIsEmpty($inputData = [], $requireData = []): bool
        {
            if (empty($inputData) || empty($requireData)) {
                return false;
            }
            if (count($requireData) <= 0 || count($inputData) <= 0) {
                return false;
            }
            if (!is_array($requireData) || !is_array($inputData)) {
                return false;
            }
            foreach ($requireData as $params) {
                if (!array_key_exists($params, $inputData)) {
                    return false;
                }

                if (empty($inputData[$params])) {
                    return false;
                }
            }

            return true;
        }

        /**
         * Function filterInputDataIsNull
         *
         * @param array $inputData
         *
         * @return bool
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2019-07-11 10:27
         *
         */
        public static function filterInputDataIsNull($inputData = []): bool
        {
            foreach ($inputData as $item) {
                if ($item === null) {
                    return true;
                }
            }

            return false;
        }

        /**
         * Function filterDate
         *
         * @param string $inputDate
         *
         * @return array
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-18 23:39
         *
         */
        public static function filterDate($inputDate = ''): array
        {
            return DateAndTime::filterDate($inputDate);
        }
    }
}
