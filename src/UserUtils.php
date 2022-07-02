<?php
/**
 * Project td-sms-feature-sdk.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/25/18
 * Time: 18:40
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\Password\Password;

if (!class_exists('nguyenanhung\Classes\Helper\UserUtils')) {
    /**
     * Class UserUtils
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class UserUtils implements ProjectInterface
    {
        use Version;

        /**
         * Function hashUserPassword
         *
         * @param string $password
         * @param string $salt
         *
         * @return false|string|null
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 50:16
         */
        public static function hashUserPassword($password = '', $salt = '')
        {
            return Password::hashUserPassword($password, $salt);
        }

        /**
         * Function hashUserPasswordGetInfo
         *
         * @param string $hash
         *
         * @return array|null
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 50:20
         */
        public static function hashUserPasswordGetInfo($hash = '')
        {
            return Password::hashUserPasswordGetInfo($hash);
        }

        /**
         * Function userPasswordNeedSReHash
         *
         * @param string $hash
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 50:23
         */
        public static function userPasswordNeedSReHash($hash = ''): bool
        {
            return Password::userPasswordNeedSReHash($hash);
        }

        /**
         * Function passwordVerify
         *
         * @param string $password
         * @param string $hash
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 50:26
         */
        public static function passwordVerify($password = '', $hash = ''): bool
        {
            return Password::passwordVerify($password, $hash);
        }
    }
}
