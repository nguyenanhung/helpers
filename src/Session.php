<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 2018-12-27
 * Time: 22:38
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\IP\Session as BaseSession;

if ( ! class_exists('nguyenanhung\Classes\Helper\Session')) {
    /**
     * Class Session
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class Session extends BaseSession
    {
    }
}
