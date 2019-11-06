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
        const VERSION       = '1.1.4';
        const LAST_MODIFIED = '2019-11-06';
        const AUTHOR_NAME   = 'Hung Nguyen';
        const AUTHOR_EMAIL  = 'dev@nguyenanhung.com';
        const PROJECT_NAME  = 'Helper';
        const TIMEZONE      = 'Asia/Ho_Chi_Minh';
        const USE_BENCHMARK = FALSE;
        const USE_DEBUG     = FALSE;

        // Thuật toán mã hóa chữ ký xác thực
        const HASH_ALGORITHM                 = 'md5';
        const REQUEST_METHOD                 = 'POST';
        const USER_PASSWORD_RANDOM_LENGTH    = 6;
        const USER_PASSWORD_RANDOM_ALGORITHM = 'numeric';
        const USER_TOKEN_ALGORITHM           = 'md5';
        const USER_SALT_ALGORITHM            = 'md5';

        /**
         * Hàm lấy thông tin phiên bản Package
         *
         * @return mixed|string Current Project Version, VD: 0.1.0
         * @author  : 713uk13m <dev@nguyenanhung.com>
         * @time    : 10/13/18 15:12
         *
         */
        public function getVersion();
    }
}
