<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/19
 * Time: 10:49
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\JWT\JWTHelper as BaseJWTHelper;

if ( ! class_exists('nguyenanhung\Classes\Helper\JWTHelper')) {
    /**
     * Class JWTHelper
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class JWTHelper extends BaseJWTHelper implements ProjectInterface
    {
        use Version;
    }
}
