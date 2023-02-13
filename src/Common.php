<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\Text\TextProcessor;
use nguyenanhung\Libraries\UUID\AlphaID;
use nguyenanhung\Libraries\Snippets\IsEmpty\IsEmpty;
use nguyenanhung\Libraries\HTML\Common as HtmlCommon;
use nguyenanhung\Libraries\Basic\Miscellaneous\Miscellaneous;

if (!class_exists('nguyenanhung\Classes\Helper\Common')) {
    /**
     * Class Common
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class Common implements ProjectInterface
    {
        const HTML_ESCAPE_CHARSET = 'UTF-8';

        use Version;

        public function dump($str)
        {
            Miscellaneous::dump($str);
        }

        public function dump_die($str)
        {
            Miscellaneous::dump_die($str);
        }

        /**
         * Function isEmpty
         *
         * @param mixed $var
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/22/2021 09:44
         */
        public function isEmpty($var = '')
        {
            return (new IsEmpty())->isEmpty($var);
        }

        /**
         * Function jsonItem
         *
         * @param string $json_string
         * @param string $item_output
         *
         * @return null|string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:08
         *
         */
        public function jsonItem($json_string = '', $item_output = '')
        {
            return Json::jsonItem($json_string, $item_output);
        }

        /**
         * Function isJson
         *
         * @param string $json
         *
         * @return bool TRUE or FALSE
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 09:39
         *
         */
        public function isJson($json = '')
        {
            return Json::isJson($json);
        }

        /**
         * Function arrayToObject
         *
         * @param array $array
         * @param false $str_to_lower
         *
         * @return array|false|\stdClass
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/22/2021 09:23
         */
        public function arrayToObject($array = array(), $str_to_lower = false)
        {
            return Arr::arrayToObject($array, $str_to_lower);
        }

        /**
         * Function objectToArray
         *
         * @param string $object
         *
         * @return false|mixed|string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 10:58
         *
         */
        public function objectToArray($object = '')
        {
            return Arr::objectToArray($object);
        }

        /**
         * Function arrayQuickSort
         *
         * @param array $array
         *
         * @return array
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:47
         *
         */
        public function arrayQuickSort($array = array())
        {
            return Arr::arrayQuickSort($array);
        }

        /**
         * Function zuluTime
         *
         * @return string|null
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 17:29
         */
        public function zuluTime()
        {
            return DateAndTime::zuluTime();
        }

        /**
         * Create a "Random" String
         *
         * @param string $type type of random string.  basic, alpha, alnum, numeric, nozero, unique, md5, encrypt and sha1
         * @param int    $len  number of characters
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         */
        public function randomString($type = 'alnum', $len = 8)
        {
            return Str::randomString($type, $len);
        }

        /**
         * Function directoryMap
         *
         * @param      $source_dir
         * @param int  $directory_depth
         * @param bool $hidden
         *
         * @return array|bool
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:33
         *
         */
        public function directoryMap($source_dir, $directory_depth = 0, $hidden = false)
        {
            return Dir::directoryMap($source_dir, $directory_depth, $hidden);
        }

        /**
         * Function newFolder
         *
         * @param string $pathname Folder to Create
         * @param int    $mode     Mode Permission, default is 0777
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 41:25
         */
        public function newFolder($pathname = '', $mode = 0777)
        {
            return (new File())->createNewFolder($pathname, $mode);
        }

        /**
         * Function formatSizeUnits
         *
         * @param int $bytes
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/08/2021 12:58
         */
        public function formatSizeUnits($bytes = 0)
        {
            return (new File())->formatSizeUnits($bytes);
        }

        /**
         * Function placeholder
         *
         * @param string $size
         * @param string $bg_color
         * @param string $text_color
         * @param string $text
         * @param string $domain
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:07
         *
         */
        public function placeholder($size = '300x250', $bg_color = '', $text_color = '', $text = '', $domain = 'https://via.placeholder.com/')
        {
            return (new HtmlCommon())->placeholder($size, $bg_color, $text_color, $text, $domain);
        }

        /************************** HTML + XML HELPER **************************/
        /**
         * Function meta
         *
         * @param string|array $name
         * @param string       $content
         * @param string       $type
         * @param string       $newline
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:17
         *
         */
        public function meta($name = '', $content = '', $type = 'name', $newline = "\n")
        {
            return (new HtmlCommon())->meta($name, $content, $type, $newline);
        }

        /**
         * Function metaProperty
         *
         * @param string|array $property
         * @param string       $content
         * @param string       $type
         * @param string       $newline
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:09
         *
         */
        public function metaProperty($property = '', $content = '', $type = 'property', $newline = "\n")
        {
            return (new HtmlCommon())->metaProperty($property, $content, $type, $newline);
        }

        /**
         * Function metaTagEquiv
         *
         * @param array $data
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:18
         *
         */
        public function metaTagEquiv($data = array())
        {
            return (new HtmlCommon())->metaTagEquiv($data);
        }

        /**
         * Function metaDnsPrefetch
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/30/18 16:17
         *
         */
        public function metaDnsPrefetch()
        {
            return (new HtmlCommon())->metaDnsPrefetch();
        }

        /**
         * Function sitemapParse
         *
         * @param string       $domain
         * @param string|array $loc
         * @param string       $lastmod
         * @param string       $type
         * @param string       $newline
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:11
         *
         */
        public function sitemapParse($domain = '', $loc = '', $lastmod = '', $type = 'property', $newline = "\n")
        {
            return (new HtmlCommon())->sitemapParse($domain, $loc, $lastmod, $type, $newline);
        }

        /**
         * Convert Reserved XML characters to Entities
         *
         * @param string $str
         * @param bool   $protect_all
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:11
         *
         */
        public function xmlConvert($str, $protect_all = false)
        {
            return (new HtmlCommon())->xmlConvert($str, $protect_all);
        }

        /**
         * Function viewPagination
         *
         * @param array $options
         *
         * @return string|null
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:16
         *
         */
        public function viewPagination($options = array())
        {
            return (new HtmlCommon())->viewPagination($options);
        }

        /**
         * Function viewVideoTVPagination
         *
         * @param $options
         *
         * @return string|null
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 16/06/2022 53:14
         */
        public function viewVideoTVPagination($options = array())
        {
            return (new HtmlCommon())->viewVideoTVPagination($options);
        }

        /**
         * Function viewMorePagination
         *
         * @param $options
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 14/02/2023 33:35
         */
        public function viewMorePagination($options = array())
        {
            return (new HtmlCommon())->viewMorePagination($options);
        }

        /**
         * Function viewMorePagination
         *
         * @param $options
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 14/02/2023 33:28
         */
        public function viewSelectPagination($options = array())
        {
            return (new HtmlCommon())->viewSelectPagination($options);
        }

        /**
         * Function cleanPaginationUrl
         *
         * @param $str
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 16/06/2022 53:52
         */
        public function cleanPaginationUrl($str = '')
        {
            return (new HtmlCommon())->cleanPaginationUrl($str);
        }

        /**
         * Function getPageNumber
         *
         * @param $str
         *
         * @return array|string|string[]
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 16/06/2022 54:22
         */
        public function getPageNumber($str = '')
        {
            return (new HtmlCommon())->getPageNumber($str);
        }

        /**
         * Function htmlEscape - Returns HTML escaped variable.
         *
         * @param mixed $var           The input string or array of strings to be escaped.
         * @param bool  $double_encode $double_encode set to FALSE prevents escaping twice.
         *
         * @return    mixed            The escaped string or array of strings as a result.
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:22
         *
         */
        public function htmlEscape($var = '', $double_encode = true)
        {
            return (new HtmlCommon())->htmlEscape($var, $double_encode);
        }

        /**
         * Function stripQuotes
         *
         * @param string $str
         *
         * @return array|string|string[]
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/08/2021 11:13
         */
        public function stripQuotes($str = '')
        {
            return (new HtmlCommon())->stripQuotes($str);
        }

        /**
         * Quotes to Entities
         *
         * Converts single and double quotes to entities
         *
         * @param string $str
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         */
        public function quotesToEntities($str = '')
        {
            return (new HtmlCommon())->quotesToEntities($str);
        }

        /**
         * Reduce Double Slashes
         *
         * Converts double slashes in a string to a single slash,
         * except those found in http://
         *
         * http://www.some-site.com//index.php
         *
         * becomes:
         *
         * http://www.some-site.com/index.php
         *
         * @param string $str
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         */
        public function reduceDoubleSlashes($str = '')
        {
            return (new HtmlCommon())->reduceDoubleSlashes($str);
        }

        /**
         * Reduce Multiples
         *
         * Reduces multiple instances of a particular character.  Example:
         *
         * Fred, Bill,, Joe, Jimmy
         *
         * becomes:
         *
         * Fred, Bill, Joe, Jimmy
         *
         * @param string $str
         * @param string $character the character you wish to reduce
         * @param bool   $trim      TRUE/FALSE - whether to trim the character from the beginning/end
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         */
        public function reduceMultiples($str = '', $character = ',', $trim = false)
        {
            return (new HtmlCommon())->reduceMultiples($str, $character, $trim);
        }

        /**
         * Function stripHtmlTag
         *
         * @param string $str
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 09:49
         *
         */
        public function stripHtmlTag($str = '')
        {
            return (new HtmlCommon())->stripHtmlTag($str);
        }

        /**
         * Function stripIsTags
         *
         * Strip 1 tag cố định
         *
         * @param      $str
         * @param      $tags
         * @param bool $stripContent
         *
         * @return null|string|string[]
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 09:51
         *
         */
        public function stripIsTags($str, $tags, $stripContent = false)
        {
            return (new HtmlCommon())->stripIsTags($str, $tags, $stripContent);
        }

        /************************** TEXT HELPER **************************/
        /**
         * Word Limiter
         *
         * Limits a string to X number of words.
         *
         * @param string $str
         * @param int    $limit
         * @param string $end_char the end character. Usually an ellipsis
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         */
        public function wordLimiter($str = '', $limit = 100, $end_char = '&#8230;')
        {
            return TextProcessor::wordLimiter($str, $limit, $end_char);
        }

        /**
         * Word Censoring Function
         *
         * Supply a string and an array of disallowed words and any
         * matched words will be converted to #### or to the replacement
         * word you've submitted.
         *
         * @param string       $str         the text string
         * @param string|array $censored    the array of censored words
         * @param string       $replacement the optional replacement value
         *
         * @return    string
         */
        public function wordCensor($str = '', $censored = '', $replacement = '')
        {
            return TextProcessor::wordCensor($str, $censored, $replacement);
        }

        /**
         * Word Wrap
         *
         * Wraps text at the specified character. Maintains the integrity of words.
         * Anything placed between {unwrap}{/unwrap} will not be word wrapped, nor
         * will URLs.
         *
         * @param string $str     the text string
         * @param int    $charlim = 76    the number of characters to wrap at
         *
         * @return    string
         */
        public function wordWrap($str = '', $charlim = 76)
        {
            return TextProcessor::wordWrap($str, $charlim);
        }

        /**
         * Character Limiter
         *
         * Limits the string based on the character count.  Preserves complete words
         * so the character count may not be exactly as specified.
         *
         * @param string $str
         * @param int    $n
         * @param string $end_char the end character. Usually an ellipsis
         *
         * @return    string
         */
        public function characterLimiter($str = '', $n = 500, $end_char = '&#8230;')
        {
            return TextProcessor::characterLimiter($str, $n, $end_char);
        }

        /**
         * High ASCII to Entities
         *
         * Converts high ASCII text and MS Word special characters to character entities
         *
         * @param string $str
         *
         * @return    string
         */
        public function asciiToEntities($str = '')
        {
            return TextProcessor::asciiToEntities($str);
        }

        /**
         * Entities to ASCII
         *
         * Converts character entities back to ASCII
         *
         * @param string $str
         * @param bool   $all
         *
         * @return    string
         */
        public function entitiesToAscii($str = '', $all = true)
        {
            return TextProcessor::entitiesToAscii($str, $all);
        }

        /**
         * Code Highlighter
         *
         * Colorizes code strings
         *
         * @param string $str the text string
         *
         * @return    string
         */
        public function highlightCode($str = '')
        {
            return TextProcessor::highlightCode($str);
        }

        /**
         * Phrase Highlighter
         *
         * Highlights a phrase within a text string
         *
         * @param string $str       the text string
         * @param string $phrase    the phrase you'd like to highlight
         * @param string $tag_open  the openging tag to precede the phrase with
         * @param string $tag_close the closing tag to end the phrase with
         *
         * @return    string
         */
        public function highlightPhrase($str = '', $phrase = '', $tag_open = '<mark>', $tag_close = '</mark>')
        {
            return TextProcessor::highlightPhrase($str, $phrase, $tag_open, $tag_close);
        }

        /**
         * Keyword Highlighter
         *
         * Highlights a keyword within a text string
         *
         * @param string $str       the text string
         * @param string $phrase    the phrase you'd like to highlight
         * @param string $tag_open  the opening tag to precede the phrase with
         * @param string $tag_close the closing tag to end the phrase with
         *
         * @return    string
         */
        public function highlightKeyword($str = '', $phrase = '', $tag_open = '<mark>', $tag_close = '</mark>')
        {
            return TextProcessor::highlightKeyword($str, $phrase, $tag_open, $tag_close);
        }

        /**
         * Function convertStrToEn
         *
         * @param string $str
         * @param string $separator
         *
         * @return array|mixed|string|string[]
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/08/2021 09:43
         */
        public function convertStrToEn($str = '', $separator = '-')
        {
            return Str::convertStrToEn($str, $separator);
        }

        /************************** EMAIL HELPER **************************/
        /**
         * Function validEmail
         *
         * @param string $email
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 47:01
         */
        public function validEmail($email = '')
        {
            return Email::validateEmail($email);
        }

        /************************** PASSWORD HELPER **************************/
        /**
         * Function strongPassword
         *
         * @param int    $length
         * @param false  $add_dashes
         * @param string $available_sets
         *
         * @return string
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 46:00
         */
        public function strongPassword($length = 20, $add_dashes = false, $available_sets = 'luna')
        {
            return Password::generateStrongPassword($length, $add_dashes, $available_sets);
        }

        /**
         * Function validStrongPassword
         *
         * @param string $password
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 45:16
         */
        public function validStrongPassword($password = '')
        {
            return Password::validStrongPassword($password);
        }

        /**
         * Function createSalt
         *
         * @return array|string|string[]
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 09/21/2021 03:04
         */
        public function createSalt()
        {
            return Password::createSaltWithMcrypt();
        }

        /************************** ALPHA ID **************************/
        /**
         * Translates a number to a short alhanumeric version
         *
         * Translated any number up to 9007199254740992
         * to a shorter version in letters e.g.:
         * 9007199254740989 --> PpQXn7COf
         *
         * specifiying the second argument true, it will
         * translate back e.g.:
         * PpQXn7COf --> 9007199254740989
         *
         * this function is based on any2dec && dec2any by
         * fragmer[at]mail[dot]ru
         * see: http://nl3.php.net/manual/en/function.base-convert.php#52450
         *
         * If you want the alphaID to be at least 3 letter long, use the
         * $pad_up = 3 argument
         *
         * In most cases this is better than totally random ID generators
         * because this can easily avoid duplicate ID's.
         * For example if you correlate the alpha ID to an auto incrementing ID
         * in your database, you're done.
         *
         * The reverse is done because it makes it slightly more cryptic,
         * but it also makes it easier to spread lots of IDs in different
         * directories on your filesystem. Example:
         * $part1 = substr($alpha_id,0,1);
         * $part2 = substr($alpha_id,1,1);
         * $part3 = substr($alpha_id,2,strlen($alpha_id));
         * $destindir = "/".$part1."/".$part2."/".$part3;
         * // by reversing, directories are more evenly spread out. The
         * // first 26 directories already occupy 26 main levels
         *
         * more info on limitation:
         * - http://blade.nagaokaut.ac.jp/cgi-bin/scat.rb/ruby/ruby-talk/165372
         *
         * if you really need this for bigger numbers you probably have to look
         * at things like: http://theserverpages.com/php/manual/en/ref.bc.php
         * or: http://theserverpages.com/php/manual/en/ref.gmp.php
         * but I haven't really dugg into this. If you have more info on those
         * matters feel free to leave a comment.
         *
         * @author    Kevin van Zonneveld <kevin@vanzonneveld.net>
         * @author    Simon Franz
         * @author    Deadfish
         * @copyright 2008 Kevin van Zonneveld (http://kevin.vanzonneveld.net)
         * @license   http://www.opensource.org/licenses/bsd-license.php New BSD Licence
         * @version   SVN: Release: $Id: alphaID.inc.php 344 2009-06-10 17:43:59Z kevin $
         * @link      http://kevin.vanzonneveld.net/
         *
         * @param mixed   $in      String or long input to translate
         * @param boolean $to_num  Reverses translation when true
         * @param mixed   $pad_up  Number or boolean padds the result up to a specified length
         * @param string  $passKey Supplying a password makes it harder to calculate the original ID
         *
         * @return string string or long
         */
        public static function alphaID($in, $to_num = false, $pad_up = false, $passKey = null)
        {
            return AlphaID::generateAlphaId($in, $to_num, $pad_up, $passKey);
        }
    }
}
