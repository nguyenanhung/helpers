<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

use DateTime;
use Exception;

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
        public static function filterInputDataIsArray($inputData = [], $requireData = [])
        {
            if (empty($inputData) || empty($requireData)) {
                return FALSE;
            }
            if (count($requireData) <= 0 || count($inputData) <= 0) {
                return FALSE;
            }
            if (!is_array($requireData) || !is_array($inputData)) {
                return FALSE;
            }
            foreach ($requireData as $params) {
                if (!array_key_exists($params, $inputData)) {
                    return FALSE;
                }
            }

            return TRUE;
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
        public static function filterRequireInputDataIsNull($inputData = [], $requireData = [])
        {
            if (empty($inputData) || empty($requireData)) {
                return FALSE;
            }
            if (count($requireData) <= 0 || count($inputData) <= 0) {
                return FALSE;
            }
            if (!is_array($requireData) || !is_array($inputData)) {
                return FALSE;
            }
            foreach ($requireData as $params) {
                if (!array_key_exists($params, $inputData)) {
                    return FALSE;
                } else {
                    if (is_null($inputData[$params])) {
                        return FALSE;
                    }
                }
            }

            return TRUE;
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
        public static function filterRequireInputDataIsEmpty($inputData = [], $requireData = [])
        {
            if (empty($inputData) || empty($requireData)) {
                return FALSE;
            }
            if (count($requireData) <= 0 || count($inputData) <= 0) {
                return FALSE;
            }
            if (!is_array($requireData) || !is_array($inputData)) {
                return FALSE;
            }
            foreach ($requireData as $params) {
                if (!array_key_exists($params, $inputData)) {
                    return FALSE;
                } else {
                    if (empty($inputData[$params])) {
                        return FALSE;
                    }
                }
            }

            return TRUE;
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
        public static function filterInputDataIsNull($inputData = [])
        {
            foreach ($inputData as $item) {
                if ($item === NULL) {
                    return TRUE;
                }
            }

            return FALSE;
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
        public static function filterDate($inputDate = '')
        {
            if ($inputDate != '') {
                // Get date
                if ($inputDate == 'back_1_day') {
                    try {
                        $dateTime = new DateTime("-1 day");
                        $result   = array(
                            'date'       => $dateTime->format('Y-m-d'),
                            'day'        => $dateTime->format('Ymd'),
                            'month'      => $dateTime->format('Y-m'),
                            'monthTable' => $dateTime->format('Y_m')
                        );
                    }
                    catch (Exception $e) {
                        if (function_exists('log_message')) {
                            $message = 'Error Code: ' . $e->getCode() . ' - File: ' . $e->getFile() . ' - Line: ' . $e->getLine() . ' - Message: ' . $e->getMessage();
                            log_message('error', $message);
                        }
                        $result = array(
                            'date'       => date('Y-m-d', strtotime("-1 day", strtotime($inputDate))),
                            'day'        => date('Ymd', strtotime("-1 day", strtotime($inputDate))),
                            'month'      => date('Y-m', strtotime("-1 day", strtotime($inputDate))),
                            'monthTable' => date('Y_m', strtotime("-1 day", strtotime($inputDate)))
                        );
                    }
                } else {
                    $result = array(
                        'date'       => date('Y-m-d', strtotime($inputDate)),
                        'day'        => date('Ymd', strtotime($inputDate)),
                        'month'      => date('Y-m', strtotime($inputDate)),
                        'monthTable' => date('Y_m', strtotime($inputDate))
                    );
                }
            } else {
                $result = array(
                    'date'       => date('Y-m-d'),
                    'day'        => date('Ymd'),
                    'month'      => date('Y-m'),
                    'monthTable' => date('Y_m')
                );
            }

            return $result;
        }
    }
}
