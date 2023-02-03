<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 15/01/2023
 * Time: 01:57
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\SimpleRequestCurl\SimpleRestfulRequest as SimpleRequestRestfulCurlLib;

if (!class_exists('nguyenanhung\Classes\Helper\SimpleRestfulRequest')) {
    class SimpleRestfulRequest extends SimpleRequestRestfulCurlLib implements ProjectInterface
    {
        use Version;
    }
}
