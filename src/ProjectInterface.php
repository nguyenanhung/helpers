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
        const VERSION       = '1.0';
        const LAST_MODIFIED = '2018-12-26';
        const AUTHOR_NAME   = 'Hung Nguyen';
        const AUTHOR_EMAIL  = 'dev@nguyenanhung.com';
        const PROJECT_NAME  = 'Helper';
        const TIMEZONE      = 'Asia/Ho_Chi_Minh';
        const USE_BENCHMARK = FALSE;
        const USE_DEBUG     = FALSE;

        /**
         * Hàm lấy thông tin phiên bản Package
         *
         * @author  : 713uk13m <dev@nguyenanhung.com>
         * @time    : 10/13/18 15:12
         *
         * @return mixed|string Current Project Version, VD: 0.1.0
         */
        public function getVersion();
    }
}
