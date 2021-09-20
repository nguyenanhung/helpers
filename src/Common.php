<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

use stdClass;

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

        /**
         * Function isEmpty
         *
         * @param string $input
         *
         * @return bool
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:00
         *
         */
        public function isEmpty($input = ''): bool
        {
            $isset = isset($input);
            if ($isset === true) {
                if (empty($input)) {
                    return true;
                }

                return false;
            }

            return true;
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
        public function jsonItem($json_string = '', $item_output = ''): ?string
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
        public function isJson($json = ''): bool
        {
            return Json::isJson($json);
        }

        /**
         * Function arrayToObject
         *
         * @param array|mixed $array
         * @param bool        $str_to_lower
         *
         * @return array|bool|stdClass
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 10:57
         *
         */
        public function arrayToObject($array = [], $str_to_lower = false)
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
        public function arrayQuickSort($array = []): array
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
        public function zuluTime(): ?string
        {
            return DateAndTime::zuluTime();
        }

        /**
         * Create a "Random" String
         *
         * @param string    type of random string.  basic, alpha, alnum, numeric, nozero, unique, md5, encrypt and sha1
         * @param int    number of characters
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         */
        public function randomString($type = 'alnum', $len = 8): string
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
        public function newFolder($pathname = '', $mode = 0777): bool
        {
            $file = new File();

            return $file->createNewFolder($pathname, $mode);
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
        public function formatSizeUnits($bytes = 0): string
        {
            $file = new File();

            return $file->formatSizeUnits($bytes);
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
        public function placeholder($size = '300x250', $bg_color = '', $text_color = '', $text = '', $domain = 'https://via.placeholder.com/'): string
        {
            if (!empty($bg_color)) {
                $bg_color = '/' . $bg_color;
            }
            if (!empty($text_color)) {
                $text_color = '/' . $text_color;
            }
            if (!empty($text)) {
                $text = '/' . $text;
            }
            $link = trim($domain) . trim($size) . trim($bg_color) . trim($text_color) . trim($text);

            return '<img alt="Place-Holder" title="Place Holder" src="' . $link . '">';
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
        public function meta($name = '', $content = '', $type = 'name', $newline = "\n"): string
        {
            // Since we allow the data to be passes as a string, a simple array
            // or a multidimensional one, we need to do a little prepping.
            if (!is_array($name)) {
                $name = [['name' => $name, 'content' => $content, 'type' => $type, 'newline' => $newline]];
            } elseif (isset($name['name'])) {
                // Turn single array into multidimensional
                $name = [$name];
            }

            $str = '';
            foreach ($name as $meta) {
                $type    = (isset($meta['type']) && $meta['type'] !== 'name') ? 'http-equiv' : 'name';
                $name    = $meta['name'] ?? '';
                $content = $meta['content'] ?? '';
                $newline = $meta['newline'] ?? "\n";

                $str .= '<meta ' . $type . '="' . $name . '" content="' . $content . '" />' . $newline;
            }

            return $str;
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
        public function metaProperty($property = '', $content = '', $type = 'property', $newline = "\n"): string
        {
            // Since we allow the data to be passes as a string, a simple array
            // or a multidimensional one, we need to do a little prepping.
            if (!is_array($property)) {
                $property = [
                    [
                        'property' => $property,
                        'content'  => $content,
                        'type'     => $type,
                        'newline'  => $newline
                    ]
                ];
            } elseif (isset($property['property'])) {
                // Turn single array into multidimensional
                $property = [
                    $property
                ];
            }
            $str = '';
            foreach ($property as $meta) {
                if (!empty($meta)) {
                    $type = (isset($meta['type']) && $meta['type'] !== 'property') ? 'itemprop' : 'property';
                }
                $property = $meta['property'] ?? '';
                $content  = $meta['content'] ?? '';
                $newline  = $meta['newline'] ?? "\n";
                $str      .= '<meta ' . $type . '="' . $property . '" content="' . $content . '" />' . $newline;
            }

            return $str;
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
        public function metaTagEquiv($data = []): string
        {
            $content    = [
                [
                    'name'    => 'X-UA-Compatible',
                    'content' => 'IE=edge',
                    'type'    => 'http-equiv'
                ],
                [
                    'name'    => 'refresh',
                    'content' => $data['refresh']['content'] ?? 1800,
                    'type'    => 'equiv'
                ],
                [
                    'name'    => 'content-language',
                    'content' => 'vi',
                    'type'    => 'equiv'
                ],
                [
                    'name'    => 'audience',
                    'content' => $data['audience']['content'] ?? 'general',
                    'type'    => 'equiv'
                ]
            ];
            $meta_equiv = $this->meta($content);

            return trim($meta_equiv);
        }

        /**
         * Function metaDnsPrefetch
         *
         * @return string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/30/18 16:17
         *
         */
        public function metaDnsPrefetch(): string
        {
            $meta = "<!-- DNS prefetch -->\n";
            $meta .= "<link rel='dns-prefetch' href = '//www.google-analytics.com/' > \n";
            $meta .= "<link rel='dns-prefetch' href = '//fonts.googleapis.com' > \n";
            $meta .= "<link rel='dns-prefetch' href='//ajax.googleapis.com'>\n";
            $meta .= "<link rel='dns-prefetch' href='//maps.google.com'>\n";
            $meta .= "<link rel='dns-prefetch' href='//connect.facebook.net/'>\n";

            return $meta;
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
        public function sitemapParse($domain = '', $loc = '', $lastmod = '', $type = 'property', $newline = "\n"): string
        {
            // Since we allow the data to be passes as a string, a simple array
            // or a multidimensional one, we need to do a little prepping.
            if (!is_array($loc)) {
                $loc = [
                    [
                        'loc'     => $loc,
                        'lastmod' => $lastmod,
                        'type'    => $type,
                        'newline' => $newline
                    ]
                ];
            } elseif (isset($loc['loc'])) {
                // Turn single array into multidimensional
                $loc = [
                    $loc
                ];
            }
            $str = '';
            foreach ($loc as $meta) {
                $type    = 'loc';
                $loc     = $meta['loc'] ?? '';
                $lastmod = $meta['lastmod'] ?? '';
                $newline = $meta['newline'] ?? "\n";
                $str     .= "\n<sitemap>\n";
                $str     .= '<' . $type . '>' . trim($domain) . trim($loc) . '.xml' . '</loc>';
                $str     .= "\n<lastmod>" . $lastmod . "</lastmod>";
                $str     .= "\n</sitemap>";
                $str     .= $newline;
            }

            return $str;
        }

        /**
         * Convert Reserved XML characters to Entities
         *
         * @param string
         * @param bool
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:11
         *
         */
        public function xmlConvert($str, $protect_all = false): string
        {
            $temp = '__TEMP_AMPERSANDS__';

            // Replace entities to temporary markers so that
            // ampersands won't get messed up
            $str = preg_replace('/&#(\d+);/', $temp . '\\1;', $str);

            if ($protect_all === true) {
                $str = preg_replace('/&(\w+);/', $temp . '\\1;', $str);
            }

            $str = str_replace(
                ['&', '<', '>', '"', "'", '-'],
                ['&amp;', '&lt;', '&gt;', '&quot;', '&apos;', '&#45;'],
                $str
            );

            // Decode the temp markers back to entities
            $str = preg_replace('/' . $temp . '(\d+);/', '&#\\1;', $str);

            if ($protect_all === true) {
                return preg_replace('/' . $temp . '(\w+);/', '&\\1;', $str);
            }

            return $str;
        }

        /**
         * Function viewPagination
         *
         * @param array $input_data
         *
         * @return null|string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:16
         *
         */
        public function viewPagination($input_data = []): ?string
        {
            // $page_type           = $input_data['page_type'] ?? '';
            $page_link           = $input_data['page_link'] ?? '';
            $page_title          = $input_data['page_title'] ?? '';
            $page_prefix         = $input_data['page_prefix'] ?? '';
            $page_suffix         = $input_data['page_suffix'] ?? '';
            $current_page_number = $input_data['current_page_number'] ?? 1;
            $total_item          = $input_data['total_item'] ?? 0;
            $item_per_page       = $input_data['item_per_page'] ?? 10;
            $begin               = $input_data['pre_rows'] ?? 3;
            $end                 = $input_data['suf_rows'] ?? 3;
            $first_link          = $input_data['first_link'] ?? '&nbsp;';
            $last_link           = $input_data['last_link'] ?? '&nbsp;';

            /**
             * Kiểm tra giá trị page_number truyền vào
             * Nếu ko có giá trị hoặc giá trị = 0 -> set giá trị = 1
             */
            if (!$current_page_number || empty($current_page_number)) {
                $current_page_number = 1;
            }

            // Tính tổng số page có
            $total_page = ceil($total_item / $item_per_page);
            if ($total_page <= 1) {
                return null;
            }

            $output_html = '';
            if ($current_page_number <> 1) {
                $output_html .= '<li class="left"><a href="' . trim($page_link) . trim($page_suffix) . '" title="' . trim($page_title) . '">' . trim($first_link) . '</a></li>';
            }

            for ($page_number = 1; $page_number <= $total_page; $page_number++) {
                if ($page_number < ($current_page_number - $begin) || $page_number > ($current_page_number + $end)) {
                    continue;
                }

                if ($page_number === $current_page_number) {
                    $output_html .= '<li class="selected"><a href="' . trim($page_link) . trim($page_prefix) . trim($page_number) . trim($page_suffix) . '" title="' . $page_title . ' trang ' . $page_number . '">' . $page_number . '</a></li>';
                } else {
                    $output_html .= '<li><a href="' . trim($page_link) . trim($page_prefix) . trim($page_number) . trim($page_suffix) . '" title="' . $page_title . ' trang ' . $page_number . '">' . $page_number . '</a></li>';
                }
            }

            unset($page_number);

            if ($current_page_number <> $total_page) {
                $output_html .= '<li class="right"><a href="' . trim($page_link) . trim($page_prefix) . trim($total_page) . trim($page_suffix) . '" title="' . trim($page_title) . ' - trang cuối">' . trim($last_link) . '</a></li>';
            }

            return $output_html;
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
            if (empty($var)) {
                return $var;
            }
            if (is_array($var)) {
                foreach (array_keys($var) as $key) {
                    $var[$key] = $this->htmlEscape($var[$key], $double_encode);
                }

                return $var;
            }

            return htmlspecialchars($var, ENT_QUOTES, self::HTML_ESCAPE_CHARSET, $double_encode);
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
            return str_replace(['"', "'"], '', $str);
        }

        /**
         * Quotes to Entities
         *
         * Converts single and double quotes to entities
         *
         * @param string
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         */
        public function quotesToEntities($str = ''): string
        {
            return str_replace(["\'", "\"", "'", '"'], ["&#39;", "&quot;", "&#39;", "&quot;"], $str);
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
         * @param string
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         */
        public function reduceDoubleSlashes($str = ''): string
        {
            return preg_replace('#(^|[^:])//+#', '\\1/', $str);
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
         * @param string
         * @param string    the character you wish to reduce
         * @param bool    TRUE/FALSE - whether to trim the character from the beginning/end
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         */
        public function reduceMultiples($str = '', $character = ',', $trim = false): string
        {
            $str = preg_replace('#' . preg_quote($character, '#') . '{2,}#', $character, $str);

            return ($trim === true) ? trim($str, $character) : $str;
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
        public function stripHtmlTag($str = ''): string
        {
            $regex          = '/([^<]*<\s*[a-z](?:[0-9]|[a-z]{0,9}))(?:(?:\s*[a-z\-]{2,14}\s*=\s*(?:"[^"]*"|\'[^\']*\'))*)(\s*\/?>[^<]*)/i';
            $chunks         = preg_split($regex, $str, -1, PREG_SPLIT_DELIM_CAPTURE);
            $chunkCount     = count($chunks);
            $strippedString = '';
            for ($n = 1; $n < $chunkCount; $n++) {
                $strippedString .= $chunks[$n];
            }

            return $strippedString;
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
            $content = '';
            if (!is_array($tags)) {
                $tags = (strpos($str, '>') !== false ? explode('>', str_replace('<', '', $tags)) : [
                    $tags
                ]);
                if (end($tags) === '') {
                    array_pop($tags);
                }
            }
            foreach ($tags as $tag) {
                if ($stripContent) {
                    $content = '(.+</' . $tag . '(>|\s[^>]*>)|)';
                }
                $str = preg_replace('#</?' . $tag . '(>|\s[^>]*>)' . $content . '#is', '', $str);
            }

            return $str;
        }

        /************************** TEXT HELPER **************************/
        /**
         * Word Limiter
         *
         * Limits a string to X number of words.
         *
         * @param string
         * @param int
         * @param string    the end character. Usually an ellipsis
         *
         * @return    string
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         */
        public function wordLimiter($str = '', $limit = 100, $end_char = '&#8230;'): string
        {
            if (trim($str) === '') {
                return $str;
            }

            preg_match('/^\s*+(?:\S++\s*+){1,' . (int) $limit . '}/', $str, $matches);

            if (strlen($str) === strlen($matches[0])) {
                $end_char = '';
            }

            return rtrim($matches[0]) . $end_char;
        }

        /**
         * Character Limiter
         *
         * Limits the string based on the character count.  Preserves complete words
         * so the character count may not be exactly as specified.
         *
         * @param string
         * @param int
         * @param string    the end character. Usually an ellipsis
         *
         * @return    string
         */
        public function characterLimiter($str = '', $n = 500, $end_char = '&#8230;'): ?string
        {
            if (mb_strlen($str) < $n) {
                return $str;
            }

            // a bit complicated, but faster than preg_replace with \s+
            $str = preg_replace('/ {2,}/', ' ', str_replace(["\r", "\n", "\t", "\v", "\f"], ' ', $str));

            if (mb_strlen($str) <= $n) {
                return $str;
            }

            $out = '';
            foreach (explode(' ', trim($str)) as $val) {
                $out .= $val . ' ';

                if (mb_strlen($out) >= $n) {
                    $out = trim($out);

                    return (mb_strlen($out) === mb_strlen($str)) ? $out : $out . $end_char;
                }
            }

            return null;
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
        public function asciiToEntities($str = ''): string
        {
            $out    = '';
            $length = defined('MB_OVERLOAD_STRING')
                ? mb_strlen($str, '8bit') - 1
                : strlen($str) - 1;
            for ($i = 0, $count = 1, $temp = []; $i <= $length; $i++) {
                $ordinal = ord($str[$i]);

                if ($ordinal < 128) {
                    /*
                        If the $temp array has a value but we have moved on, then it seems only
                        fair that we output that entity and restart $temp before continuing. -Paul
                    */
                    if (count($temp) === 1) {
                        $out   .= '&#' . array_shift($temp) . ';';
                        $count = 1;
                    }

                    $out .= $str[$i];
                } else {
                    if (count($temp) === 0) {
                        $count = ($ordinal < 224) ? 2 : 3;
                    }

                    $temp[] = $ordinal;

                    if (count($temp) === $count) {
                        $number = ($count === 3)
                            ? (($temp[0] % 16) * 4096) + (($temp[1] % 64) * 64) + ($temp[2] % 64)
                            : (($temp[0] % 32) * 64) + ($temp[1] % 64);

                        $out   .= '&#' . $number . ';';
                        $count = 1;
                        $temp  = [];
                    } // If this is the last iteration, just output whatever we have
                    elseif ($i === $length) {
                        $out .= '&#' . implode(';', $temp) . ';';
                    }
                }
            }

            return $out;
        }

        /**
         * Entities to ASCII
         *
         * Converts character entities back to ASCII
         *
         * @param string
         * @param bool
         *
         * @return    string
         */
        public function entitiesToAscii($str = '', $all = true): string
        {
            $pattern = '/\&#(\d+)\;/';
            if (preg_match_all($pattern, $str, $matches)) {
                for ($i = 0, $s = count($matches[0]); $i < $s; $i++) {
                    $digits = $matches[1][$i];
                    $out    = '';

                    if ($digits < 128) {
                        $out .= chr($digits);

                    } elseif ($digits < 2048) {
                        $out .= chr(192 + (($digits - ($digits % 64)) / 64)) . chr(128 + ($digits % 64));
                    } else {
                        $out .= chr(224 + (($digits - ($digits % 4096)) / 4096))
                                . chr(128 + ((($digits % 4096) - ($digits % 64)) / 64))
                                . chr(128 + ($digits % 64));
                    }

                    $str = str_replace($matches[0][$i], $out, $str);
                }
            }

            if ($all) {
                return str_replace(
                    ['&amp;', '&lt;', '&gt;', '&quot;', '&apos;', '&#45;'],
                    ['&', '<', '>', '"', "'", '-'],
                    $str
                );
            }

            return $str;
        }

        /**
         * Word Censoring Function
         *
         * Supply a string and an array of disallowed words and any
         * matched words will be converted to #### or to the replacement
         * word you've submitted.
         *
         * @param string $str         the text string
         * @param string|array $censored    the array of censored words
         * @param string $replacement the optional replacement value
         *
         * @return    string
         */
        public function wordCensor($str = '', $censored = '', $replacement = ''): string
        {
            if (!is_array($censored)) {
                return $str;
            }

            $str = ' ' . $str . ' ';

            // \w, \b and a few others do not match on a unicode character
            // set for performance reasons. As a result words like über
            // will not match on a word boundary. Instead, we'll assume that
            // a bad word will be bookeneded by any of these characters.
            $delim = '[-_\'\"`(){}<>\[\]|!?@#%&,.:;^~*+=\/ 0-9\n\r\t]';

            foreach ($censored as $badword) {
                $badword = str_replace('\*', '\w*?', preg_quote($badword, '/'));
                if ($replacement !== '') {
                    $str = preg_replace(
                        "/({$delim})(" . $badword . ")({$delim})/i",
                        "\\1{$replacement}\\3",
                        $str
                    );
                } elseif (preg_match_all("/{$delim}(" . $badword . "){$delim}/i", $str, $matches, PREG_PATTERN_ORDER | PREG_OFFSET_CAPTURE)) {
                    $matches = $matches[1];
                    for ($i = count($matches) - 1; $i >= 0; $i--) {
                        $length = strlen($matches[$i][0]);
                        $str    = substr_replace(
                            $str,
                            str_repeat('#', $length),
                            $matches[$i][1],
                            $length
                        );
                    }
                }
            }

            return trim($str);
        }

        /**
         * Code Highlighter
         *
         * Colorizes code strings
         *
         * @param string    the text string
         *
         * @return    string
         */
        public function highlightCode($str = ''): string
        {
            /* The highlight string function encodes and highlights
             * brackets so we need them to start raw.
             *
             * Also replace any existing PHP tags to temporary markers
             * so they don't accidentally break the string out of PHP,
             * and thus, thwart the highlighting.
             */
            $str = str_replace(
                ['&lt;', '&gt;', '<?', '?>', '<%', '%>', '\\', '</script>'],
                ['<', '>', 'phptagopen', 'phptagclose', 'asptagopen', 'asptagclose', 'backslashtmp', 'scriptclose'],
                $str
            );

            // The highlight_string function requires that the text be surrounded
            // by PHP tags, which we will remove later
            $str = highlight_string('<?php ' . $str . ' ?>', true);

            // Remove our artificially added PHP, and the syntax highlighting that came with it
            $str = preg_replace(
                [
                    '/<span style="color: #([A-Z0-9]+)">&lt;\?php(&nbsp;| )/i',
                    '/(<span style="color: #[A-Z0-9]+">.*?)\?&gt;<\/span>\n<\/span>\n<\/code>/is',
                    '/<span style="color: #[A-Z0-9]+"><\/span>/i'
                ],
                [
                    '<span style="color: #$1">',
                    "$1</span>\n</span>\n</code>",
                    ''
                ],
                $str
            );

            // Replace our markers back to PHP tags.
            return str_replace(
                ['phptagopen', 'phptagclose', 'asptagopen', 'asptagclose', 'backslashtmp', 'scriptclose'],
                ['&lt;?', '?&gt;', '&lt;%', '%&gt;', '\\', '&lt;/script&gt;'],
                $str
            );
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
        public function highlightPhrase($str = '', $phrase = '', $tag_open = '<mark>', $tag_close = '</mark>'): string
        {
            define('UTF8_ENABLED', true);

            return ($str !== '' && $phrase !== '')
                ? preg_replace('/(' . preg_quote($phrase, '/') . ')/i' . (UTF8_ENABLED ? 'u' : ''), $tag_open . '\\1' . $tag_close, $str)
                : $str;
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
        public function wordWrap($str = '', $charlim = 76): string
        {
            // Set the character limit
            is_numeric($charlim) or $charlim = 76;

            // Reduce multiple spaces
            $str = preg_replace('| +|', ' ', $str);

            // Standardize newlines
            if (strpos($str, "\r") !== false) {
                $str = str_replace(["\r\n", "\r"], "\n", $str);
            }

            // If the current word is surrounded by {unwrap} tags we'll
            // strip the entire chunk and replace it with a marker.
            $unwrap        = [];
            $patternUnWrap = '|\{unwrap\}(.+?)\{/unwrap\}|s';
            if (preg_match_all($patternUnWrap, $str, $matches)) {
                for ($i = 0, $c = count($matches[0]); $i < $c; $i++) {
                    $unwrap[] = $matches[1][$i];
                    $str      = str_replace($matches[0][$i], '{{unwrapped' . $i . '}}', $str);
                }
            }

            // Use PHP's native function to do the initial wordwrap.
            // We set the cut flag to FALSE so that any individual words that are
            // too long get left alone. In the next step we'll deal with them.
            $str = wordwrap($str, $charlim, "\n", false);

            // Split the string into individual lines of text and cycle through them
            $output = '';
            foreach (explode("\n", $str) as $line) {
                // Is the line within the allowed character count?
                // If so we'll join it to the output and continue
                if (mb_strlen($line) <= $charlim) {
                    $output .= $line . "\n";
                    continue;
                }

                $temp = '';
                while (mb_strlen($line) > $charlim) {
                    // If the over-length word is a URL we won't wrap it
                    $charlimPatter = '!\[url.+\]|://|www\.!';
                    if (preg_match($charlimPatter, $line)) {
                        break;
                    }

                    // Trim the word down
                    $temp .= mb_substr($line, 0, $charlim - 1);
                    $line = mb_substr($line, $charlim - 1);
                }

                // If $temp contains data it means we had to split up an over-length
                // word into smaller chunks so we'll add it back to our current line
                if ($temp !== '') {
                    $output .= $temp . "\n" . $line . "\n";
                } else {
                    $output .= $line . "\n";
                }
            }

            // Put our markers back
            if (count($unwrap) > 0) {
                foreach ($unwrap as $key => $val) {
                    $output = str_replace('{{unwrapped' . $key . '}}', $val, $output);
                }
            }

            return $output;
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
        public function validEmail($email = ''): bool
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
        public function strongPassword($length = 20, $add_dashes = false, $available_sets = 'luna'): string
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
        public function validStrongPassword($password = ''): bool
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
         * @return false|string string or long
         */
        public static function alphaID($in, $to_num = false, $pad_up = false, $passKey = null)
        {
            $index = "abcdefghijkmnpqrstuvwxyz123456789";
            if ($passKey !== null) {
                // Although this function's purpose is to just make the
                // ID short - and not so much secure,
                // with this patch by Simon Franz (http://blog.snaky.org/)
                // you can optionally supply a password to make it harder
                // to calculate the corresponding numeric ID
                $indexLen = strlen($index);
                for ($n = 0; $n < $indexLen; $n++) {
                    $i[] = substr($index, $n, 1);
                }

                $passhash = hash('sha256', $passKey);
                $passhash = (strlen($passhash) < strlen($index))
                    ? hash('sha512', $passKey)
                    : $passhash;

                for ($n = 0; $n < $indexLen; $n++) {
                    $p[] = substr($passhash, $n, 1);
                }

                array_multisort($p, SORT_DESC, $i);
                $index = implode($i);
            }

            $base = strlen($index);

            if ($to_num) {
                // Digital number  <<--  alphabet letter code
                $in  = strrev($in);
                $out = 0;
                $len = strlen($in) - 1;
                for ($t = 0; $t <= $len; $t++) {
                    $pow = pow($base, $len - $t);
                    $out = $out + strpos($index, substr($in, $t, 1)) * $pow;
                }

                if (is_numeric($pad_up)) {
                    $pad_up--;
                    if ($pad_up > 0) {
                        $out -= pow($base, $pad_up);
                    }
                }
                $out = sprintf('%F', $out);
                $out = substr($out, 0, strpos($out, '.'));
            } else {
                // Digital number  -->>  alphabet letter code
                if (is_numeric($pad_up)) {
                    $pad_up--;
                    if ($pad_up > 0) {
                        $in += pow($base, $pad_up);
                    }
                }

                $out = "";
                for ($t = floor(log($in, $base)); $t >= 0; $t--) {
                    $bcp = pow($base, $t);
                    $a   = floor($in / $bcp) % $base;
                    $out = $out . substr($index, $a, 1);
                    $in  = $in - ($a * $bcp);
                }
                $out = strrev($out); // reverse
            }

            return $out;
        }
    }
}
