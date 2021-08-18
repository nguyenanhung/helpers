<?php
/**
 * Project td-sms-feature-sdk.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/9/18
 * Time: 17:00
 */

namespace nguyenanhung\Classes\Helper;

use stdClass;
use Exception;
use DateTime;
use DateTimeZone;

/**
 * Class Utils
 *
 * @package   nguyenanhung\Classes\Helper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Utils implements ProjectInterface
{
    use Version;

    /**
     * Header Redirect
     *
     * Header redirect in two flavors
     * For very fine grained control over headers, you could use the Output
     * Library's set_header() function.
     *
     * @param string $uri       URL
     * @param string $method    Redirect method
     *                          'auto', 'location' or 'refresh'
     * @param int    $code      HTTP Response status code
     *
     * @return    void
     *
     * @copyright https://www.codeigniter.com/
     */
    public static function redirect($uri = '', $method = 'auto', $code = NULL)
    {
        // IIS environment likely? Use 'refresh' for better compatibility
        if ($method === 'auto' && isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== FALSE) {
            $method = 'refresh';
        } elseif ($method !== 'refresh' && (empty($code) or !is_numeric($code))) {
            if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1') {
                $code = ($_SERVER['REQUEST_METHOD'] !== 'GET')
                    ? 303    // reference: http://en.wikipedia.org/wiki/Post/Redirect/Get
                    : 307;
            } else {
                $code = 302;
            }
        }
        switch ($method) {
            case 'refresh':
                header('Refresh:0;url=' . $uri);
                break;
            default:
                header('Location: ' . $uri, TRUE, $code);
                break;
        }
        exit;
    }

    /**
     * Function isJson
     *
     * @param $string
     *
     * @return bool
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/26/18 10:50
     *
     */
    public static function isJson($string = '')
    {
        json_decode($string);

        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Function arrayToObject
     *
     * @param array $data
     *
     * @return array|bool|mixed
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-07-18 11:29
     *
     */
    public static function arrayToObject($data = [])
    {
        if (!is_array($data)) {
            return $data;
        }
        if (count($data) > 0) {
            $json = json_encode($data);

            return json_decode($json);
        }

        return FALSE;
    }

    /**
     * Function objectFormat
     *
     * @param string $data
     *
     * @return array|bool|mixed|\stdClass|string
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/26/18 10:51
     *
     */
    public static function objectFormat($data = '')
    {
        if (is_object($data)) {
            return $data;
        }
        if (is_array($data)) {
            return static::arrayToObject($data);
        }
        if (static::isJson($data)) {
            return json_decode($data);
        }

        return new stdClass();
    }

    /**
     * Function expireTime
     *
     * @param int $duration
     *
     * @return string
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-07-15 10:57
     *
     */
    public static function expireTime($duration = 1)
    {
        try {
            $expire     = $duration <= 1 ? new DateTime("+0 days") : new DateTime("+$duration days");
            $expireTime = $expire->format('Y-m-d') . ' 23:59:59';
        }
        catch (Exception $e) {
            $expireTime = date('Y-m-d') . ' 23:59:59';
        }

        return $expireTime;
    }

    /**
     * Function generateHashValue
     *
     * @param string $str
     *
     * @return string
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/18/18 03:04
     *
     */
    public static function generateHashValue($str = '')
    {
        return hash(self::HASH_ALGORITHM, $str);
    }

    /**
     * Function generateUserPasswordRandom
     *
     * @return string
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/19/18 10:08
     *
     */
    public static function generateUserPasswordRandom()
    {
        return random_string(self::USER_PASSWORD_RANDOM_ALGORITHM, self::USER_PASSWORD_RANDOM_LENGTH);
    }

    /**
     * Function generateUserToken
     *
     * @return string
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/19/18 10:08
     *
     */
    public static function generateUserToken()
    {
        return random_string(self::USER_TOKEN_ALGORITHM);
    }

    /**
     * Function generateUserSaltKey
     *
     * @return string
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/19/18 10:08
     *
     */
    public static function generateUserSaltKey()
    {
        return random_string(self::USER_SALT_ALGORITHM);
    }

    /**
     * Function generateRequestId
     *
     * @return string
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/23/18 17:15
     *
     */
    public static function generateRequestId()
    {
        return date('YmdHis') . random_string('numeric', 10);
    }

    /**
     * Function generateVinaRequestId
     *
     * @return string
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-06 22:04
     *
     */
    public static function generateVinaRequestId()
    {
        return date('YmdHis') . ceil(microtime(TRUE) * 1000);
    }

    /**
     * Function generateOTPCode
     *
     * @param int $length
     *
     * @return string
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/23/18 17:16
     *
     */
    public static function generateOTPCode($length = 6)
    {
        return random_string('numeric', $length);
    }

    /**
     * Function generateOTPExpireTime
     *
     * @param int $hour
     *
     * @return string
     * @throws \Exception
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-06 16:03
     *
     */
    public static function generateOTPExpireTime($hour = 4)
    {
        $time = new DateTime('+' . $hour . ' days');

        return $time->format('Y-m-d H:i:s');
    }

    /**
     * Function zuluTime
     *
     * @return string
     * @throws \Exception
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/28/2021 35:16
     */
    public static function zuluTime()
    {
        $dateUTC = new DateTime("now", new DateTimeZone("UTC"));

        return $dateUTC->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * Function commonMessageTelco
     *
     * @param string $content
     * @param string $type
     * @param string $count_type
     *
     * @return false|float|int|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 52:42
     */
    public static function commonMessageTelco($content = '', $type = 'length', $count_type = 'default')
    {
        if ($type === 'length') {
            return strlen($content);
        }
        if ($type === 'count' && $count_type === 'default') {
            return ceil(strlen($content) / 160);
        }

        return $content;
    }
}
