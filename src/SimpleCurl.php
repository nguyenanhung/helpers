<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 15/01/2023
 * Time: 01:56
 */

namespace nguyenanhung\Classes\Helper;

if (!class_exists('nguyenanhung\Classes\Helper\SimpleCurl')) {
    class SimpleCurl implements ProjectInterface
    {
        use Version;

        protected $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36';
        protected $url;
        protected $data;
        protected $followLocation;
        protected $timeout;
        protected $maxRedirects;
        protected $cookieFileLocation;
        protected $xml;
        protected $json;
        protected $post;
        protected $postFields;
        protected $referer = "";
        protected $session;
        protected $webpage;
        protected $headers;
        protected $headerOut;
        protected $includeHeader;
        protected $noBody;
        protected $status;
        protected $isError = false;
        protected $error;
        protected $binaryTransfer;
        protected $userOptions;
        protected $authentication = 0;
        protected $authUsername = '';
        protected $authPassword = '';

        /**
         * SimpleCurl constructor.
         *
         * @param string $url
         * @param array  $options
         *
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         */
        public function __construct($url = '', $options = array())
        {
            $this->url = $url;
            $this->followLocation = true;
            $this->timeout = 180;
            $this->maxRedirects = 10;
            $this->noBody = false;
            $this->includeHeader = false;
            $this->headerOut = true;
            $this->binaryTransfer = false;
            $this->headers[] = "Connection: keep-alive";
            $this->headers[] = "Keep-Alive: 300";
            $this->headers[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
            $this->headers[] = "Accept-Language: en-us,en;q=0.5";
            $this->userOptions = $options;
        }

        public function setBinaryTransfer($binaryTransfer = true)
        {
            $this->binaryTransfer = $binaryTransfer;

            return $this;
        }

        public function setCookieFileLocation($cookieFileLocation = '')
        {
            $this->cookieFileLocation = $cookieFileLocation;

            return $this;
        }

        public function useAuth($use)
        {
            $this->authentication = 0;
            if ($use === true) {
                $this->authentication = 1;
            }

            return $this;
        }

        public function setAuthUsername($authUsername)
        {
            $this->authUsername = $authUsername;

            return $this;
        }

        public function setAuthPassword($authPassword)
        {
            $this->authPassword = $authPassword;

            return $this;
        }

        public function setUrl($url)
        {
            $this->url = $url;

            return $this;
        }

        public function setReferer($referer)
        {
            $this->referer = $referer;

            return $this;
        }

        public function setHeader($header)
        {
            $this->headers[] = $header;

            return $this;
        }

        public function includeHeader($includeHeader = true)
        {
            $this->includeHeader = $includeHeader;

            return $this;
        }

        public function setPost($postFields)
        {
            if (is_array($postFields)) {
                $postFields = http_build_query($postFields);
            }
            $this->post = true;
            $this->postFields = $postFields;

            return $this;
        }

        public function setJson($postFields)
        {
            if (is_array($postFields)) {
                $postFields = json_encode($postFields);
            }
            $this->json = true;
            $this->postFields = $postFields;
            $this->headers[] = "Accept: application/json; charset=utf-8";
            $this->headers[] = "Content-Type: application/json; charset=utf-8";

            return $this;
        }

        public function setXml($xmlData)
        {
            $this->xml = true;
            $this->postFields = $xmlData;
            $this->headers[] = "Accept: text/xml; charset=utf-8";
            $this->headers[] = "Content-Type: text/xml; charset=utf-8";

            return $this;
        }

        public function setData($data)
        {
            $this->data = $data;

            return $this;
        }

        public function setUserAgent($userAgent)
        {
            $this->userAgent = $userAgent;

            return $this;
        }

        public function createCurl($url = null)
        {
            if ($url !== null) {
                $this->url = $url;
            }
            $s = curl_init();
            curl_setopt($s, CURLOPT_URL, $this->url);
            curl_setopt($s, CURLOPT_HTTPHEADER, $this->headers);
            curl_setopt($s, CURLOPT_TIMEOUT, $this->timeout);
            curl_setopt($s, CURLOPT_MAXREDIRS, $this->maxRedirects);
            curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($s, CURLOPT_FOLLOWLOCATION, $this->followLocation);
            if (!empty($this->cookieFileLocation) && file_exists($this->cookieFileLocation)) {
                curl_setopt($s, CURLOPT_COOKIEJAR, $this->cookieFileLocation);
                curl_setopt($s, CURLOPT_COOKIEFILE, $this->cookieFileLocation);
            }
            //curl_setopt($s, CURLOPT_SSL_VERIFYHOST, 0);
            //curl_setopt($s, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($s, CURLINFO_HEADER_OUT, $this->headerOut);
            curl_setopt($s, CURLOPT_FILETIME, 1);
            if ($this->authentication === 1) {
                curl_setopt($s, CURLOPT_USERPWD, $this->authUsername . ':' . $this->authPassword);
            }
            if ($this->post || $this->json || $this->xml) {
                curl_setopt($s, CURLOPT_POST, true);
                curl_setopt($s, CURLOPT_POSTFIELDS, $this->postFields);
            }
            if ($this->includeHeader) {
                curl_setopt($s, CURLOPT_HEADER, true);
            }
            if ($this->noBody) {
                curl_setopt($s, CURLOPT_NOBODY, true);
            }
            if ($this->binaryTransfer) {
                curl_setopt($s, CURLOPT_BINARYTRANSFER, true);
            }
            curl_setopt($s, CURLOPT_USERAGENT, $this->userAgent);
            curl_setopt($s, CURLOPT_REFERER, $this->referer);
            curl_setopt_array($s, $this->userOptions);
            $this->webpage = curl_exec($s);
            $this->status = curl_getinfo($s);
            $this->error = curl_error($s);
            if ($this->error) {
                $this->isError = true;
            }
            $this->session = $s;

            return $this;
        }

        public function closeCurl()
        {
            curl_close($this->session);
        }

        public function getHttpStatus()
        {
            return $this->status;
        }

        public function getResponse()
        {
            return $this->webpage;
        }

        public function isError()
        {
            return $this->isError;
        }

        public function getError()
        {
            return $this->error;
        }

        public function __toString()
        {
            return $this->webpage;
        }
    }
}
