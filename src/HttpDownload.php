<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 06/03/2021
 * Time: 14:07
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\HttpDownload\HttpDownload as LibrariesHttpDownload;

if ( ! class_exists('nguyenanhung\Classes\Helper\HttpDownload')) {
    class HttpDownload extends LibrariesHttpDownload
    {
    }
}
