<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 15/01/2023
 * Time: 01:59
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\Encryption\SimpleVerifiedKey as BaseSimpleVerifiedKey;

if ( ! class_exists('nguyenanhung\Classes\Helper\SimpleVerifiedKey')) {
    class SimpleVerifiedKey extends BaseSimpleVerifiedKey implements ProjectInterface
    {
        use Version;
    }
}
