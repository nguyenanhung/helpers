<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/19
 * Time: 10:43
 */

namespace nguyenanhung\Classes\Helper;

use Exception;

/**
 * Class IP
 *
 * @package   nguyenanhung\Classes\Helper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>'
 */
class IP implements ProjectInterface
{
    use Version;

    /**
     * Get Region from IP
     *
     * @param string $ip
     * @param string $apiToken
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 11/6/19 49:11
     */
    public static function getRegion($ip = '', $apiToken = '')
    {
        if (empty($ip)) {
            return FALSE;
        }
        try {
            $url      = 'https://ipinfo.io/' . $ip;
            $params   = array('token' => $apiToken);
            $endpoint = $url . '?' . http_build_query($params);
            $curl     = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL            => $endpoint,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "GET",
                CURLOPT_HTTPHEADER     => array(),
            ));

            $response = curl_exec($curl);
            $err      = curl_error($curl);
            curl_close($curl);
            if ($err) {
                $message = "cURL Error #:" . $err;
                if (function_exists('log_message')) {
                    log_message('error', $message);
                }

                return FALSE;
            } else {
                $result = json_decode($response, TRUE);
                if (isset($result['region'])) {
                    return $result['region'];
                }
            }

            return FALSE;
        }
        catch (Exception $e) {
            $message = 'Code: ' . $e->getCode() . ' - File: ' . $e->getFile() . ' - Line: ' . $e->getLine() . ' - Message: ' . $e->getMessage();
            if (function_exists('log_message')) {
                log_message('error', $message);
            }

            return FALSE;
        }
    }
}
