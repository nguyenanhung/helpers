<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

if (!interface_exists('nguyenanhung\Classes\Helper\ProjectInterface')) {
    /**
     * Interface ProjectInterface
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    interface ProjectInterface
    {
        const VERSION       = '3.0.8.4';
        const LAST_MODIFIED = '2022-07-22';
        const AUTHOR_NAME   = 'Hung Nguyen';
        const AUTHOR_EMAIL  = 'dev@nguyenanhung.com';
        const AUTHOR_URL    = 'https://nguyenanhung.com';
        const PROJECT_NAME  = 'Helper';
        const TIMEZONE      = 'Asia/Ho_Chi_Minh';
        const USE_BENCHMARK = false;
        const USE_DEBUG     = false;
        // Thuật toán mã hóa chữ ký xác thực
        const HASH_ALGORITHM                 = 'md5';
        const REQUEST_METHOD                 = 'POST';
        const USER_PASSWORD_RANDOM_LENGTH    = 16;
        const USER_PASSWORD_RANDOM_ALGORITHM = 'numeric';
        const USER_TOKEN_ALGORITHM           = 'md5';
        const USER_SALT_ALGORITHM            = 'md5';

        /**
         * Function getVersion
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 07/28/2021 03:59
         */
        public function getVersion(): string;
    }
}
