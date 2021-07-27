<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/19
 * Time: 10:50
 */

namespace nguyenanhung\Classes\Helper;
if (!class_exists('nguyenanhung\Classes\Helper\Email')) {
    /**
     * Class Email
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class Email implements ProjectInterface
    {
        use Version;

        /**
         * Function validateEmail
         *
         * @param $email
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 59:25
         */
        public static function validateEmail($email)
        {
            // Remove all illegal characters from email
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return TRUE;
            }

            return FALSE;
        }
    }
}
