<?php
if (!function_exists('escapeHtml')) {
    /**
     * Function escapeHtml
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-09 14:24
     *
     * @param string $string
     *
     * @return string
     */
    function escapeHtml($string = '')
    {
        $escape = new \Zend\Escaper\Escaper('utf-8');

        return $escape->escapeHtml($string);
    }
}
if (!function_exists('escapeHtmlAttr')) {
    /**
     * Function escapeHtmlAttr
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-09 14:24
     *
     * @param string $string
     *
     * @return string
     */
    function escapeHtmlAttr($string = '')
    {
        $escape = new \Zend\Escaper\Escaper('utf-8');

        return $escape->escapeHtmlAttr($string);
    }
}
if (!function_exists('escapeJs')) {
    /**
     * Function escapeJs
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-09 14:25
     *
     * @param string $string
     *
     * @return string
     */
    function escapeJs($string = '')
    {
        $escape = new \Zend\Escaper\Escaper('utf-8');

        return $escape->escapeJs($string);
    }
}
if (!function_exists('escapeCss')) {
    /**
     * Function escapeCss
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-09 14:25
     *
     * @param string $string
     *
     * @return string
     */
    function escapeCss($string = '')
    {
        $escape = new \Zend\Escaper\Escaper('utf-8');

        return $escape->escapeCss($string);
    }
}
if (!function_exists('escapeUrl')) {
    /**
     * Function escapeUrl
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-09 14:25
     *
     * @param string $string
     *
     * @return string
     */
    function escapeUrl($string = '')
    {
        $escape = new \Zend\Escaper\Escaper('utf-8');

        return $escape->escapeUrl($string);
    }
}
if (!function_exists('removeInvisibleCharacters')) {
    /**
     * Remove Invisible Characters
     *
     * This prevents sandwiching null characters
     * between ascii characters, like Java\0script.
     *
     * @param    string
     * @param    bool
     *
     * @return    string
     */
    function removeInvisibleCharacters($str, $url_encoded = TRUE)
    {
        $nonDisplay = array();
        // every control character except newline (dec 10),
        // carriage return (dec 13) and horizontal tab (dec 09)
        if ($url_encoded) {
            $nonDisplay[] = '/%0[0-8bcef]/i';    // url encoded 00-08, 11, 12, 14, 15
            $nonDisplay[] = '/%1[0-9a-f]/i';    // url encoded 16-31
            $nonDisplay[] = '/%7f/i';    // url encoded 127
        }
        $nonDisplay[] = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';    // 00-08, 11, 12, 14-31, 127
        do {
            $str = preg_replace($nonDisplay, '', $str, -1, $count);
        }
        while ($count);

        return $str;
    }
}
