<?php
if (!function_exists('dump')) {
    function dump($str = '')
    {
        echo "<pre>";
        print_r($str);
        echo "</pre>";
    }
}
if (!function_exists('vardump_pre')) {
    function vardump_pre($str = '')
    {
        echo "<pre>";
        print_r($str);
        echo "</pre>";
    }
}
if (!function_exists('dump_die')) {
    function dump_die($str = '')
    {
        echo "<pre>";
        print_r($str);
        echo "</pre>";
        die;
    }
}
if (!function_exists('isEmpty')) {
    function isEmpty($input = ''): bool
    {
        return (new nguyenanhung\Classes\Helper\Common())->isEmpty($input);
    }
}
if (!function_exists('isEmail')) {
    function isEmail($mail = ''): bool
    {
        return \nguyenanhung\Classes\Helper\Email::validateEmail($mail);
    }
}
if (!function_exists('developer_fullname_copyright')) {
    function developer_name_copyright(): string
    {
        return 'Nguyễn An Hưng';
    }
}
if (!function_exists('developer_shortname_copyright')) {
    function developer_shortname_copyright(): string
    {
        return 'Hung Nguyen';
    }
}
if (!function_exists('developer_website_copyright')) {
    function developer_website_copyright(): string
    {
        return 'https://nguyenanhung.com/';
    }
}
if (!function_exists('developer_email_copyright')) {
    function developer_email_copyright(): string
    {
        return 'dev@nguyenanhung.com';
    }
}
