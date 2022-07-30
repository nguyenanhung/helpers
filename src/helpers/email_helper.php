<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/19
 * Time: 10:51
 */
if (!function_exists('isEmail')) {
    /**
     * Function isEmail
     *
     * @param mixed $mail
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 11/6/19 52:32
     */
    function isEmail($mail = ''): bool
    {
        return \nguyenanhung\Classes\Helper\Email::validateEmail($mail);
    }
}
