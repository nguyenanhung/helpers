<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/19
 * Time: 10:55
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\UUID\UUID as BasicUUID;

if ( ! class_exists('nguyenanhung\Classes\Helper\UUID')) {
    /**
     * Class UUID
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class UUID extends BasicUUID
    {
    }
}
