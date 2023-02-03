<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 15/01/2023
 * Time: 01:56
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\SimpleRequestCurl\SimpleCurl as SimpleRequestCurlLib;

if (!class_exists('nguyenanhung\Classes\Helper\SimpleCurl')) {
    class SimpleCurl extends SimpleRequestCurlLib implements ProjectInterface
    {
        use Version;
    }
}
