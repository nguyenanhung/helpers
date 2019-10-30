<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/30/19
 * Time: 10:00
 */

namespace nguyenanhung\Classes\Helper;

/**
 * Class Password
 *
 * @package   nguyenanhung\Classes\Helper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Password implements ProjectInterface
{
    use Version;

    /**
     * Function generateRandomPassword
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/30/19 46:04
     */
    public static function generateRandomPassword()
    {
        return random_string('alnum', 10);
    }

    /**
     * Function generateRandomSalt
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/30/19 07:36
     */
    public static function generateRandomSalt()
    {
        return random_string('alnum', 16);
    }

    /**
     * Function generateStrongPassword
     *
     * @param int    $length
     * @param bool   $add_dashes
     * @param string $available_sets
     *
     * @return false|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/30/19 04:38
     */
    public static function generateStrongPassword($length = 20, $add_dashes = FALSE, $available_sets = 'hung')
    {
        $sets = [];
        if (strpos($available_sets, 'h') !== FALSE) {
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        }
        if (strpos($available_sets, 'u') !== FALSE) {
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        }
        if (strpos($available_sets, 'n') !== FALSE) {
            $sets[] = '0123456789';
        }
        if (strpos($available_sets, 'g') !== FALSE) {
            $sets[] = '!@#$%&*?';
        }
        $all      = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all      .= $set;
        }
        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++) {
            $password .= $all[array_rand($all)];
        }
        $password = str_shuffle($password);
        if (!$add_dashes) {
            return $password;
        }
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while (strlen($password) > $dash_len) {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;

        return $dash_str;
    }

    /**
     * Function validStrongPassword
     *
     * @param string $password
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/30/19 04:14
     */
    public static function validStrongPassword($password = '')
    {
        $containsSmallLetter = preg_match('/[a-z]/', $password); // Yêu cầu có ít nhất 1 ký tự viết thường
        $containsCapsLetter  = preg_match('/[A-Z]/', $password); // Yêu cầu có ít nhất 1 ký tự viết hoa
        $containsDigit       = preg_match('/\d/', $password); // Yêu cầu có ít nhất 1 số
        $containsSpecial     = preg_match('/[^a-zA-Z\d]/', $password); // Yêu cầu có ít nhất 1 ký tự đặc biệt

        return ($containsSmallLetter && $containsCapsLetter && $containsDigit && $containsSpecial);
    }

    /**
     * Function hashPassword
     *
     * @param string $password
     *
     * @return false|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/30/19 46:50
     */
    public static function hashPassword($password = '')
    {
        $options = array('cost' => 12);
        $hash    = password_hash($password, PASSWORD_DEFAULT, $options);

        return $hash;
    }

    /**
     * Function reHashPassword
     *
     * @param string $hash
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/30/19 08:50
     */
    public static function reHashPassword($hash = '')
    {
        $options = array('cost' => 12);
        $hash    = password_needs_rehash($hash, PASSWORD_DEFAULT, $options);

        return $hash;
    }

    /**
     * Function passwordGetInfo
     *
     * @param string $hash
     *
     * @return array|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/30/19 12:56
     */
    public static function passwordGetInfo($hash = '')
    {
        $hash = password_get_info($hash);

        return $hash;
    }

    /**
     * Function verifyPassword
     *
     * @param string $password
     * @param string $hash
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/30/19 02:54
     */
    public static function verifyPassword($password = '', $hash = '')
    {
        $verify = password_verify($password, $hash);

        return $verify;
    }

    /**
     * Function changeHashPassword
     *
     * @param string $password
     * @param string $hash
     *
     * @return bool|false|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/30/19 10:56
     */
    public static function changeHashPassword($password = '', $hash = '')
    {
        $options = array('cost' => 12);
        if (password_verify($password, $hash)) {
            // Check if a newer hashing algorithm is available
            // or the cost has changed
            if (password_needs_rehash($hash, PASSWORD_DEFAULT, $options)) {
                // If so, create a new hash, and replace the old one
                $newHash = password_hash($password, PASSWORD_DEFAULT, $options);

                return $newHash;
            }

            // Log user in
        }

        return FALSE;
    }
}
