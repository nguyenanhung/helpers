<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Classes\Helper\Filesystem\Filesystem as SymfonyFilesystem;

if (!class_exists('nguyenanhung\Classes\Helper\File')) {
    /**
     * Class File
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class File extends SymfonyFilesystem
    {
    }
}
