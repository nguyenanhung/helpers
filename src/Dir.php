<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\Filesystem\Directory as FilesystemDirectory;

if (!class_exists('nguyenanhung\Classes\Helper\Dir')) {
    /**
     * The directory (aka, "dir") class
     *
     * @since  0.1.0
     */
    class Dir extends FilesystemDirectory
    {
    }
}
