<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:00
         *
         * @param string $input
         *
         * @return bool
         */
        public function isEmpty($input = '')
        {
            $isset = isset($input);
            if ($isset === TRUE) {
                return empty($input) ? TRUE : FALSE;
            }

            return TRUE;
        }

        /**
         * Function arrayToObject
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 10:57
         *
         * @param array $array
         * @param bool  $str_to_lower
         *
         * @return array|bool|\stdClass
         */
        public function arrayToObject($array = [], $str_to_lower = FALSE)
        {
            if (!is_array($array)) {
                return $array;
            }
            $object = new \stdClass();
            if (is_array($array) && count($array) > 0) {
                foreach ($array as $name => $value) {
                    $name = trim($name);
                    if ($str_to_lower === TRUE) {
                        $name = strtolower($name);
                    }
                    if (!empty($name)) {
                        $object->$name = $this->arrayToObject($value);
                    }
                }

                return $object;
            }

            return FALSE;
        }

        /**
         * Function objectToArray
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 10:58
         *
         * @param string $object
         *
         * @return false|mixed|string
         */
        public function objectToArray($object = '')
        {
            if (!is_object($object)) {
                return $object;
            }
            $object = json_encode($object);
            $result = json_decode($object, TRUE);

            return $result;
        }

        /**
         * Function jsonItem
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:08
         *
         * @param string $json_string
         * @param string $item_output
         *
         * @return null|string
         */
        public function jsonItem($json_string = '', $item_output = '')
        {
            $result      = json_decode(trim($json_string));
            $item_output = trim($item_output);
            if ($result !== NULL) {
                if (isset($result->$item_output)) {
                    return trim($result->$item_output);
                }
            }

            return NULL;
        }

        /**
         * Function isJson
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 09:39
         *
         * @param string $json
         *
         * @return bool TRUE or FALSE
         */
        public function isJson($json = '')
        {
            $decode = json_decode(trim($json));
            if ($decode == NULL) {
                return FALSE;
            }

            return TRUE;
        }

        /**
         * Function arrayQuickSort
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:47
         *
         * @param array $array
         *
         * @return array
         */
        public function arrayQuickSort($array = [])
        {
            // find array size
            $length = count($array);
            // base case test, if array of length 0 then just return array to caller
            if ($length <= 1) {
                return $array;
            } else {
                // select an item to act as our pivot point, since list is unsorted first position is easiest
                $pivot = $array[0];
                // declare our two arrays to act as partitions
                $left  = [];
                $right = [];
                // loop and compare each item in the array to the pivot value, place item in appropriate partition
                for ($i = 1; $i < count($array); $i++) {
                    if ($array[$i] < $pivot) {
                        $left[] = $array[$i];
                    } else {
                        $right[] = $array[$i];
                    }
                }

                // use recursion to now sort the left and right lists
                return array_merge($this->arrayQuickSort($left), [
                    $pivot
                ], $this->arrayQuickSort($right));
            }
        }

        /**
         * Function zuluTime
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 2018-12-15 02:56
         *
         * @return mixed|string
         */
        public function zuluTime()
        {
            $time = new \Carbon\Carbon();

            return $time->toIso8601ZuluString();
        }

        /**
         * Create a "Random" String
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         * @param    string    type of random string.  basic, alpha, alnum, numeric, nozero, unique, md5, encrypt and sha1
         * @param    int    number of characters
         *
         * @return    string
         */
        public function randomString($type = 'alnum', $len = 8)
        {
            switch ($type) {
                case 'basic':
                    return mt_rand();
                case 'alnum':
                case 'numeric':
                case 'nozero':
                case 'alpha':
                    switch ($type) {
                        case 'alpha':
                            $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            break;
                        case 'alnum':
                            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            break;
                        case 'numeric':
                            $pool = '0123456789';
                            break;
                        case 'nozero':
                            $pool = '123456789';
                            break;
                        default:
                            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    }

                    return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
                case 'md5':
                    return md5(uniqid(mt_rand()));
                case 'sha1':
                    return sha1(uniqid(mt_rand(), TRUE));
                default:
                    return md5(uniqid(mt_rand()));
            }
        }

        /**
         * Function directoryMap
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:33
         *
         * @param      $source_dir
         * @param int  $directory_depth
         * @param bool $hidden
         *
         * @return array|bool
         */
        public function directoryMap($source_dir, $directory_depth = 0, $hidden = FALSE)
        {
            if ($fp = @opendir($source_dir)) {
                $filedata   = [];
                $new_depth  = $directory_depth - 1;
                $source_dir = rtrim($source_dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
                while (FALSE !== ($file = readdir($fp))) {
                    // Remove '.', '..', and hidden files [optional]
                    if ($file === '.' OR $file === '..' OR ($hidden === FALSE && $file[0] === '.')) {
                        continue;
                    }
                    is_dir($source_dir . $file) && $file .= DIRECTORY_SEPARATOR;
                    if (($directory_depth < 1 OR $new_depth > 0) && is_dir($source_dir . $file)) {
                        $filedata[$file] = $this->directoryMap($source_dir . $file, $new_depth, $hidden);
                    } else {
                        $filedata[] = $file;
                    }
                }
                closedir($fp);

                return $filedata;
            }

            return FALSE;
        }

        /**
         * Function newFolder
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 14:44
         *
         * @param string $pathname Folder to Create
         * @param int    $mode     Mode Permission, default is 0777
         *
         * @return bool
         */
        public function newFolder($pathname = '', $mode = 0777)
        {
            if (is_null($pathname) || empty($pathname)) {
                return FALSE;
            }
            if (is_dir($pathname) || $pathname === "/") {
                return TRUE;
            }
            if (!is_dir($pathname) && strlen($pathname) > 0) {
                try {
                    $file = new File();
                    $file->mkdir($pathname, $mode);
                    // Gen file Index.html + .htaccess
                    $file_content_index_html = "<!DOCTYPE html>\n<html lang='vi'>\n<head>\n<title>403 Forbidden</title>\n</head>\n<body>\n<p>Directory access is forbidden.</p>\n</body>\n</html>";
                    $file_content_htaccess   = "RewriteEngine On\nOptions -Indexes\nAddType text/plain php3 php4 php5 php cgi asp aspx html css js";
                    $file->appendToFile($pathname . DIRECTORY_SEPARATOR . 'index.html', $file_content_index_html);
                    $file->appendToFile($pathname . DIRECTORY_SEPARATOR . '.htaccess', $file_content_htaccess);

                    return TRUE;
                }
                catch (\Exception $e) {
                    return FALSE;
                }
            }

            return FALSE;
        }

        /**
         * Function formatSizeUnits
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 14:40
         *
         * @param int $bytes
         *
         * @return int|string
         */
        public function formatSizeUnits($bytes = 0)
        {
            if ($bytes >= 1073741824) {
                $bytes = number_format($bytes / 1073741824, 2) . ' GB';
            } elseif ($bytes >= 1048576) {
                $bytes = number_format($bytes / 1048576, 2) . ' MB';
            } elseif ($bytes >= 1024) {
                $bytes = number_format($bytes / 1024, 2) . ' KB';
            } elseif ($bytes > 1) {
                $bytes = $bytes . ' bytes';
            } elseif ($bytes == 1) {
                $bytes = $bytes . ' byte';
            } else {
                $bytes = '0 bytes';
            }

            return $bytes;
        }

        /**
         * Function placeholder
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:07
         *
         * @param string $size
         * @param string $bg_color
         * @param string $text_color
         * @param string $text
         * @param string $domain
         *
         * @return string
         */
        public function placeholder(
            $size = '300x250', $bg_color = '', $text_color = '', $text = '', $domain = 'http://via.placeholder.com/'
        ) {
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
            $html = '<img alt="Place-Holder" title="Place Holder" src="' . $link . '">';

            return $html;
        }

        /************************** HTML + XML HELPER **************************/
        /**
         * Function meta
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:17
         *
         * @param string $name
         * @param string $content
         * @param string $type
         * @param string $newline
         *
         * @return string
         */
        public function meta($name = '', $content = '', $type = 'name', $newline = "\n")
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
                $name    = isset($meta['name']) ? $meta['name'] : '';
                $content = isset($meta['content']) ? $meta['content'] : '';
                $newline = isset($meta['newline']) ? $meta['newline'] : "\n";

                $str .= '<meta ' . $type . '="' . $name . '" content="' . $content . '" />' . $newline;
            }

            return $str;
        }

        /**
         * Function metaProperty
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:09
         *
         * @param string $property
         * @param string $content
         * @param string $type
         * @param string $newline
         *
         * @return string
         */
        public function metaProperty($property = '', $content = '', $type = 'property', $newline = "\n")
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
                $type     = (isset($meta['type']) && $meta['type'] !== 'property') ? 'itemprop' : 'property';
                $property = isset($meta['property']) ? $meta['property'] : '';
                $content  = isset($meta['content']) ? $meta['content'] : '';
                $newline  = isset($meta['newline']) ? $meta['newline'] : "\n";
                $str      .= '<meta ' . $type . '="' . $property . '" content="' . $content . '" />' . $newline;
            }

            return $str;
        }

        /**
         * Function metaTagEquiv
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:18
         *
         * @param array $data
         *
         * @return string
         */
        public function metaTagEquiv($data = [])
        {
            $content    = [
                [
                    'name'    => 'X-UA-Compatible',
                    'content' => 'IE=edge',
                    'type'    => 'http-equiv'
                ],
                [
                    'name'    => 'refresh',
                    'content' => isset($data['refresh']['content']) ? $data['refresh']['content'] : 1800,
                    'type'    => 'equiv'
                ],
                [
                    'name'    => 'content-language',
                    'content' => 'vi',
                    'type'    => 'equiv'
                ],
                [
                    'name'    => 'audience',
                    'content' => isset($data['audience']['content']) ? $data['audience']['content'] : 'general',
                    'type'    => 'equiv'
                ]
            ];
            $meta_equiv = $this->meta($content);

            return trim($meta_equiv);
        }

        /**
         * Function metaDnsPrefetch
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/30/18 16:17
         *
         * @return string
         */
        public function metaDnsPrefetch()
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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:11
         *
         * @param string $domain
         * @param string $loc
         * @param string $lastmod
         * @param string $type
         * @param string $newline
         *
         * @return string
         */
        function sitemapParse($domain = '', $loc = '', $lastmod = '', $type = 'property', $newline = "\n")
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
                $type    = (isset($meta['type']) && $meta['type'] !== 'loc') ? 'loc' : 'loc';
                $loc     = isset($meta['loc']) ? $meta['loc'] : '';
                $lastmod = isset($meta['lastmod']) ? $meta['lastmod'] : '';
                $newline = isset($meta['newline']) ? $meta['newline'] : "\n";
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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:11
         *
         * @param    string
         * @param    bool
         *
         * @return    string
         */
        public function xmlConvert($str, $protect_all = FALSE)
        {
            $temp = '__TEMP_AMPERSANDS__';

            // Replace entities to temporary markers so that
            // ampersands won't get messed up
            $str = preg_replace('/&#(\d+);/', $temp . '\\1;', $str);

            if ($protect_all === TRUE) {
                $str = preg_replace('/&(\w+);/', $temp . '\\1;', $str);
            }

            $str = str_replace(
                ['&', '<', '>', '"', "'", '-'],
                ['&amp;', '&lt;', '&gt;', '&quot;', '&apos;', '&#45;'],
                $str
            );

            // Decode the temp markers back to entities
            $str = preg_replace('/' . $temp . '(\d+);/', '&#\\1;', $str);

            if ($protect_all === TRUE) {
                return preg_replace('/' . $temp . '(\w+);/', '&\\1;', $str);
            }

            return $str;
        }

        /**
         * Function viewPagination
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:16
         *
         * @param array $input_data
         *
         * @return null|string
         */
        public function viewPagination($input_data = [])
        {
            // $page_type           = isset($input_data['page_type']) ? $input_data['page_type'] : '';
            $page_link           = isset($input_data['page_link']) ? $input_data['page_link'] : '';
            $page_title          = isset($input_data['page_title']) ? $input_data['page_title'] : '';
            $page_prefix         = isset($input_data['page_prefix']) ? $input_data['page_prefix'] : '';
            $page_suffix         = isset($input_data['page_suffix']) ? $input_data['page_suffix'] : '';
            $current_page_number = isset($input_data['current_page_number']) ? $input_data['current_page_number'] : 1;
            $total_item          = isset($input_data['total_item']) ? $input_data['total_item'] : 0;
            $item_per_page       = isset($input_data['item_per_page']) ? $input_data['item_per_page'] : 10;
            $begin               = isset($input_data['pre_rows']) ? $input_data['pre_rows'] : 3;
            $end                 = isset($input_data['suf_rows']) ? $input_data['suf_rows'] : 3;
            $first_link          = isset($input_data['first_link']) ? $input_data['first_link'] : '&nbsp;';
            $last_link           = isset($input_data['last_link']) ? $input_data['last_link'] : '&nbsp;';
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
                return NULL;
            }
            $output_html = '';
            if ($current_page_number <> 1) {
                $output_html .= '<li class="left"><a href="' . trim($page_link) . trim($page_suffix) . '" title="' . trim($page_title) . '">' . trim($first_link) . '</a></li>';
            }
            for ($page_number = 1; $page_number <= $total_page; $page_number++) {
                if ($page_number < ($current_page_number - $begin) || $page_number > ($current_page_number + $end)) {
                    continue;
                }
                if ($page_number == $current_page_number) {
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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:22
         *
         * @param    mixed $var           The input string or array of strings to be escaped.
         * @param    bool  $double_encode $double_encode set to FALSE prevents escaping twice.
         *
         * @return    mixed            The escaped string or array of strings as a result.
         */
        public function htmlEscape($var = '', $double_encode = TRUE)
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
         * Strip Quotes
         *
         * Removes single and double quotes from a string
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         * @param string $str
         *
         * @return mixed
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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         * @param    string
         *
         * @return    string
         */
        public function quotesToEntities($str = '')
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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         * @param    string
         *
         * @return    string
         */
        public function reduceDoubleSlashes($str = '')
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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         * @param    string
         * @param    string    the character you wish to reduce
         * @param    bool    TRUE/FALSE - whether to trim the character from the beginning/end
         *
         * @return    string
         */
        public function reduceMultiples($str = '', $character = ',', $trim = FALSE)
        {
            $str = preg_replace('#' . preg_quote($character, '#') . '{2,}#', $character, $str);

            return ($trim === TRUE) ? trim($str, $character) : $str;
        }

        /**
         * Function stripHtmlTag
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 09:49
         *
         * @param string $str
         *
         * @return string
         */
        public function stripHtmlTag($str = '')
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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 09:51
         *
         * @param      $str
         * @param      $tags
         * @param bool $stripContent
         *
         * @return null|string|string[]
         */
        public function stripIsTags($str, $tags, $stripContent = FALSE)
        {
            $content = '';
            if (!is_array($tags)) {
                $tags = (strpos($str, '>') !== FALSE ? explode('>', str_replace('<', '', $tags)) : [
                    $tags
                ]);
                if (end($tags) == '') {
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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 9/29/18 11:25
         *
         * @param    string
         * @param    int
         * @param    string    the end character. Usually an ellipsis
         *
         * @return    string
         */
        public function wordLimiter($str = '', $limit = 100, $end_char = '&#8230;')
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
         * @param    string
         * @param    int
         * @param    string    the end character. Usually an ellipsis
         *
         * @return    string
         */
        public function characterLimiter($str = '', $n = 500, $end_char = '&#8230;')
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

            return NULL;
        }

        /**
         * High ASCII to Entities
         *
         * Converts high ASCII text and MS Word special characters to character entities
         *
         * @param    string $str
         *
         * @return    string
         */
        public function asciiToEntities($str = '')
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
         * @param    string
         * @param    bool
         *
         * @return    string
         */
        public function entitiesToAscii($str = '', $all = TRUE)
        {
            if (preg_match_all('/\&#(\d+)\;/', $str, $matches)) {
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
         * @param    string    the text string
         * @param    string    the array of censored words
         * @param    string    the optional replacement value
         *
         * @return    string
         */
        public function wordCensor($str = '', $censored = '', $replacement = '')
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
         * @param    string    the text string
         *
         * @return    string
         */
        public function highlightCode($str = '')
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
            $str = highlight_string('<?php ' . $str . ' ?>', TRUE);

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
         * @param    string $str       the text string
         * @param    string $phrase    the phrase you'd like to highlight
         * @param    string $tag_open  the openging tag to precede the phrase with
         * @param    string $tag_close the closing tag to end the phrase with
         *
         * @return    string
         */
        public function highlightPhrase($str = '', $phrase = '', $tag_open = '<mark>', $tag_close = '</mark>')
        {
            define('UTF8_ENABLED', TRUE);

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
         * @param    string $str     the text string
         * @param    int    $charlim = 76    the number of characters to wrap at
         *
         * @return    string
         */
        public function wordWrap($str = '', $charlim = 76)
        {
            // Set the character limit
            is_numeric($charlim) OR $charlim = 76;

            // Reduce multiple spaces
            $str = preg_replace('| +|', ' ', $str);

            // Standardize newlines
            if (strpos($str, "\r") !== FALSE) {
                $str = str_replace(["\r\n", "\r"], "\n", $str);
            }

            // If the current word is surrounded by {unwrap} tags we'll
            // strip the entire chunk and replace it with a marker.
            $unwrap = [];
            if (preg_match_all('|\{unwrap\}(.+?)\{/unwrap\}|s', $str, $matches)) {
                for ($i = 0, $c = count($matches[0]); $i < $c; $i++) {
                    $unwrap[] = $matches[1][$i];
                    $str      = str_replace($matches[0][$i], '{{unwrapped' . $i . '}}', $str);
                }
            }

            // Use PHP's native function to do the initial wordwrap.
            // We set the cut flag to FALSE so that any individual words that are
            // too long get left alone. In the next step we'll deal with them.
            $str = wordwrap($str, $charlim, "\n", FALSE);

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
                    if (preg_match('!\[url.+\]|://|www\.!', $line)) {
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
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 10:02
         *
         * @param string $str
         * @param string $separator
         *
         * @return bool|mixed|null|string|string[]
         */
        public function convertStrToEn($str = '', $separator = '-')
        {
            $str = trim($str);
            if (function_exists('mb_strtolower')) {
                $str = mb_strtolower($str);
            } else {
                $str = strtolower($str);
            }
            $data = DataRepository::getData('string');
            if (!empty($str)) {
                $str = preg_replace("/[^a-zA-Z0-9]/", $separator, $str);
                $str = preg_replace("/-+/", $separator, $str);
                $str = str_replace($data['special_array'], $separator, $str);
                $str = str_replace($data['vn_array'], $data['en_array'], $str);
                $str = str_replace($data['ascii_array'], $data['normal_array'], $str);
                $str = str_replace($data['utf8_array'], $data['normal_array'], $str);
                $str = str_replace(' ', $separator, $str);
                while (strpos($str, '--') > 0) {
                    $str = str_replace('--', $separator, $str);
                }
                while (strpos($str, '--') === 0) {
                    $str = str_replace('--', $separator, $str);
                }
            }

            return $str;
        }

        /************************** EMAIL HELPER **************************/
        /**
         * Validate email address
         *
         * @param    string $email
         *
         * @return    bool
         */
        public function validEmail($email = '')
        {
            return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        /************************** PASSWORD HELPER **************************/
        /**
         * Function strongPassword
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 10:20
         *
         * @param int    $length
         * @param bool   $add_dashes
         * @param string $available_sets
         *
         * @return bool|string
         */
        public function strongPassword($length = 20, $add_dashes = FALSE, $available_sets = 'luna')
        {
            $sets = [];
            if (strpos($available_sets, 'l') !== FALSE) {
                $sets[] = 'abcdefghjkmnpqrstuvwxyz';
            }
            if (strpos($available_sets, 'u') !== FALSE) {
                $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
            }
            if (strpos($available_sets, 'n') !== FALSE) {
                $sets[] = '0123456789';
            }
            if (strpos($available_sets, 'a') !== FALSE) {
                $sets[] = '!@#$%&*?';
            }
            $all      = '';
            $password = '';
            foreach ($sets as $set) {
                $password .= $set[array_rand(str_split($set))];
                $all      .= $set;
            }
            $all = str_split($all);
            for ($i = 0; $i < $length - count($sets); $i++) {
                $password .= $all[array_rand($all)];
            }
            $password = str_shuffle($password);
            if (!$add_dashes) {
                return $password;
            }
            $dash_len = floor(sqrt($length));
            $dash_str = '';
            while (strlen($password) > $dash_len) {
                $dash_str .= substr($password, 0, $dash_len) . '-';
                $password = substr($password, $dash_len);
            }
            $dash_str .= $password;

            return $dash_str;
        }

        /**
         * Function validStrongPassword
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 10:21
         *
         * @param string $password
         *
         * @return bool
         */
        public function validStrongPassword($password = '')
        {
            $containsSmallLetter = preg_match('/[a-z]/', $password); // Yêu cầu có ít nhất 1 ký tự viết thường
            $containsCapsLetter  = preg_match('/[A-Z]/', $password); // Yêu cầu có ít nhất 1 ký tự viết hoa
            $containsDigit       = preg_match('/\d/', $password); // Yêu cầu có ít nhất 1 số
            $containsSpecial     = preg_match('/[^a-zA-Z\d]/', $password); // Yêu cầu có ít nhất 1 ký tự đặc biệt

            return ($containsSmallLetter && $containsCapsLetter && $containsDigit && $containsSpecial);
        }

        /**
         * Function createSalt
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 10/13/18 10:29
         *
         * @return mixed|string
         */
        public function createSalt()
        {
            $salt = mcrypt_create_iv(32, CRYPT_BLOWFISH);
            $salt = base64_encode($salt);
            $salt = str_replace('+', '.', $salt);

            return $salt;
        }
    }
}
