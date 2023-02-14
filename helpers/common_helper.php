<?php
if (!function_exists('dump')) {
    function dump($var)
    {
        pre_print_r($var);
    }
}
if (!function_exists('dump_die')) {
    function dump_die($var)
    {
        pre_print_r_die($var);
    }
}
if (!function_exists('isEmpty')) {
    function isEmpty($input = '')
    {
        return (new nguyenanhung\Classes\Helper\Common())->isEmpty($input);
    }
}
if (!function_exists('developer_fullname_copyright')) {
    function developer_name_copyright()
    {
        return 'Nguyễn An Hưng';
    }
}
if (!function_exists('developer_shortname_copyright')) {
    function developer_shortname_copyright()
    {
        return 'Hung Nguyen';
    }
}
if (!function_exists('developer_website_copyright')) {
    function developer_website_copyright()
    {
        return 'https://nguyenanhung.com/';
    }
}
if (!function_exists('developer_email_copyright')) {
    function developer_email_copyright()
    {
        return 'dev@nguyenanhung.com';
    }
}
