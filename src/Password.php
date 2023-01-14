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

use nguyenanhung\Libraries\Password\Password as BasePassword;

if (!class_exists('nguyenanhung\Classes\Helper\Password')) {
    /**
     * Class Password
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class Password extends BasePassword
    {
    }
}
