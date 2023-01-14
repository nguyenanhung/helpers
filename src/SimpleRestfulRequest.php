<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 15/01/2023
 * Time: 01:57
 */

namespace nguyenanhung\Classes\Helper;

if (!class_exists('nguyenanhung\Classes\Helper\SimpleRestfulRequest')) {
    class SimpleRestfulRequest implements ProjectInterface
    {
        use Version;

        /**
         * Function execute
         *
         * @param string $url
         * @param string $type
         * @param string $data
         * @param mixed  $header
         *
         * @return array|int
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 28/02/2022 25:41
         */
        public static function execute($url, $type, $data = "", $header = null)
        {
            $curl = curl_init();

            if (empty($header)) {
                $header = array("Content-Type: application/json");
            }

            curl_setopt_array($curl, array(
                CURLOPT_URL            => rtrim($url, "/"),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => $type,
                CURLOPT_POSTFIELDS     => $data,
                CURLOPT_HTTPHEADER     => $header,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
            ));

            $response = json_decode(curl_exec($curl));

            unset($response->response_time);

            $err = curl_error($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;

                return -1;
            }

            return array('code' => $httpCode, 'response' => $response);
        }
    }
}
