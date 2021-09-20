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

use nguyenanhung\Libraries\Math\Random;

if (!class_exists('nguyenanhung\Classes\Helper\Password')) {
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
        public static function generateRandomPassword(): string
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
        public static function generateRandomSalt(): string
        {
            return random_string('alnum', 16);

        }

        /**
         * Function createSaltWithMcrypt
         *
         * @return array|string|string[]
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/21/2021 02:49
         */
        public static function createSaltWithMcrypt()
        {
            $salt = Random::getBytes(32);
            $salt = base64_encode($salt);

            return str_replace('+', '.', $salt);
        }

        /**
         * Function generateStrongPassword
         *
         * @param int    $length
         * @param false  $add_dashes
         * @param string $available_sets
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 49:04
         */
        public static function generateStrongPassword($length = 20, $add_dashes = false, $available_sets = 'hung'): string
        {
            $sets = [];
            if (strpos($available_sets, 'h') !== false) {
                $sets[] = 'abcdefghjkmnpqrstuvwxyz';
            }
            if (strpos($available_sets, 'u') !== false) {
                $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
            }
            if (strpos($available_sets, 'n') !== false) {
                $sets[] = '0123456789';
            }
            if (strpos($available_sets, 'g') !== false) {
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
        public static function validStrongPassword($password = ''): bool
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
            return password_hash($password, PASSWORD_DEFAULT);
        }

        /**
         * Function reHashPassword
         *
         * @param string $hash
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 45:45
         */
        public static function reHashPassword($hash = ''): bool
        {
            return password_needs_rehash($hash, PASSWORD_DEFAULT);
        }

        /**
         * Function passwordGetInfo
         *
         * @param string $hash
         *
         * @return array|null
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 45:29
         */
        public static function passwordGetInfo($hash = ''): ?array
        {
            return password_get_info($hash);
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
        public static function verifyPassword($password = '', $hash = ''): bool
        {
            return password_verify($password, $hash);
        }

        /**
         * Function changeHashPassword
         *
         * @param string $password
         * @param string $hash
         *
         * @return false|string|null
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 45:19
         */
        public static function changeHashPassword($password = '', $hash = '')
        {
            // Check if a newer hashing algorithm is available
            // or the cost has changed
            if (password_verify($password, $hash) && password_needs_rehash($hash, PASSWORD_DEFAULT)) {
                // If so, create a new hash, and replace the old one
                return password_hash($password, PASSWORD_DEFAULT);
            }

            return false;
        }
    }
}

