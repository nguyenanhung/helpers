<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 2018-12-27
 * Time: 22:48
 */
if (!function_exists('attrs')) {
    /**
     * Function attrs
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:49
     *
     * @param $attrs
     *
     * @return string
     */
    function attrs($attrs)
    {
        $str = '';

        foreach ($attrs as $key => $value) {
            $str .= $key . '="' . $value . '" ';
        }

        return $str;
    }
}
if (!function_exists('css')) {
    /**
     * Function css
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:49
     *
     * @param string $href
     * @param array  $attrs
     *
     * @return string
     */
    function css($href = '', $attrs = [])
    {
        return '<link rel="stylesheet" type="text/css" href="' . $href . '" ' . attrs($attrs) . '>';
    }
}
if (!function_exists('less')) {
    /**
     * Function less
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:49
     *
     * @param string $href
     * @param array  $attrs
     *
     * @return string
     */
    function less($href = '', $attrs = [])
    {
        return '<link rel="stylesheet/less" type="text/css" href="' . $href . '"' . attrs($attrs) . '>';
    }
}
if (!function_exists('js')) {
    /**
     * Function js
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:49
     *
     * @param null   $src
     * @param string $default
     * @param array  $attrs
     *
     * @return string
     */
    function js($src = NULL, $default = '', $attrs = [])
    {
        return '<script type="text/javascript" src="' . $src . '" ' . attrs($attrs) . '>' . $default . '</script>';
    }
}
if (!function_exists('img')) {
    /**
     * Function img
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:49
     *
     * @param null  $src
     * @param array $attrs
     *
     * @return string
     */
    function img($src = NULL, $attrs = [])
    {
        return '<img src="' . $src . '" ' . attrs($attrs) . '/>';
    }
}
if (!function_exists('fontawesome')) {
    /**
     * Function fontawesome
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:49
     *
     * @param string $version
     * @param null   $href
     *
     * @return string
     */
    function fontawesome($version = '4.7.0', $href = NULL)
    {
        if (NULL === $href) {
            $href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/' . $version . '/css/font-awesome.min.css';
        }

        return '<link rel="stylesheet" type="text/css" href="' . $href . '">';
    }
}
if (!function_exists('jquery')) {
    /**
     * Function jquery
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:50
     *
     * @param string $version
     * @param null   $src
     *
     * @return string
     */
    function jquery($version = '3.2.1', $src = NULL)
    {
        if (NULL === $src) {
            $src = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/' . $version . '/jquery.min.js';
        }

        return '<script type="text/javascript" src="' . $src . '"></script>';
    }
}
if (!function_exists('bootstrap_js')) {
    /**
     * Function bootstrap_js
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:50
     *
     * @param string $version
     * @param null   $src
     *
     * @return string
     */
    function bootstrap_js($version = '4.0.0-alpha.6', $src = NULL)
    {
        if (NULL === $src) {
            $src = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/' . $version . '/js/bootstrap.min.js';
        }

        return '<script type="text/javascript" src="' . $src . '"></script>';
    }
}
if (!function_exists('bootstrap_css')) {
    /**
     * Function bootstrap_css
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:50
     *
     * @param string $version
     * @param null   $href
     *
     * @return string
     */
    function bootstrap_css($version = '4.0.0-alpha.6', $href = NULL)
    {
        if (NULL === $href) {
            $href = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/' . $version . '/css/bootstrap.min.css';
        }

        return '<link rel="stylesheet" type="text/css" href="' . $href . '">';
    }
}
if (!function_exists('icon')) {
    /**
     * Function icon
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:50
     *
     * @param string $icon
     * @param string $tag
     *
     * @return string
     */
    function icon($icon = '', $tag = 'i')
    {
        return '<' . $tag . ' class="fa fa-' . $icon . '"></' . $tag . '>';
    }
}
if (!function_exists('google_analytics')) {
    /**
     * Function google_analytics
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:50
     *
     * @param string $ua
     *
     * @return string
     */
    function google_analytics($ua = '')
    {
        $out = "<script async src=\"https://www.googletagmanager.com/gtag/js?id=" . $ua . "\"></script>";
        $out .= "<script>";
        $out .= "window.dataLayer = window.dataLayer || [];";
        $out .= "  function gtag() {";
        $out .= "dataLayer.push(arguments);";
        $out .= " }";
        $out .= "   gtag('js', new Date());";
        $out .= "  gtag('config', 'UA-130083928-1');";
        $out .= "</script>";

        return $out;
    }
}
