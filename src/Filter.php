<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-18 22:37
         *
         * @param array $inputData
         * @param array $requireData
         *
         * @return bool
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
         * Function filterDate
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-18 23:39
         *
         * @param string $inputDate
         *
         * @return array
         */
        public static function filterDate($inputDate = '')
        {
            if ($inputDate != '') {
                // Get date
                if ($inputDate == 'back_1_day') {
                    try {
                        $dateTime = new \DateTime("-1 day");
                        $result   = [
                            'date'       => $dateTime->format('Y-m-d'),
                            'day'        => $dateTime->format('Ymd'),
                            'month'      => $dateTime->format('Y-m'),
                            'monthTable' => $dateTime->format('Y_m')
                        ];
                    }
                    catch (\Exception $e) {
                        if (function_exists('log_message')) {
                            $message = 'Error Code: ' . $e->getCode() . ' - File: ' . $e->getFile() . ' - Line: ' . $e->getLine() . ' - Message: ' . $e->getMessage();
                            log_message('error', $message);
                        }
                        $result = [
                            'date'       => date('Y-m-d', strtotime("-1 day", strtotime($inputDate))),
                            'day'        => date('Ymd', strtotime("-1 day", strtotime($inputDate))),
                            'month'      => date('Y-m', strtotime("-1 day", strtotime($inputDate))),
                            'monthTable' => date('Y_m', strtotime("-1 day", strtotime($inputDate)))
                        ];
                    }
                } else {
                    $result = [
                        'date'       => date('Y-m-d', strtotime($inputDate)),
                        'day'        => date('Ymd', strtotime($inputDate)),
                        'month'      => date('Y-m', strtotime($inputDate)),
                        'monthTable' => date('Y_m', strtotime($inputDate))
                    ];
                }
            } else {
                $result = [
                    'date'       => date('Y-m-d'),
                    'day'        => date('Ymd'),
                    'month'      => date('Y-m'),
                    'monthTable' => date('Y_m')
                ];
            }

            return $result;
        }
    }
}
