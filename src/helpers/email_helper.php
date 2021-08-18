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
     * @param string $mail
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 11/6/19 52:32
     */
    function isEmail($mail = '')
    {
        return (bool) filter_var($mail, FILTER_VALIDATE_EMAIL);
    }
}
