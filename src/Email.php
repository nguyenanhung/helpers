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

use nguyenanhung\Libraries\Email\Email as BaseEmail;

if ( ! class_exists('nguyenanhung\Classes\Helper\Email')) {
    /**
     * Class Email
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class Email extends BaseEmail implements ProjectInterface
    {
        use Version;
    }
}
