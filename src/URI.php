<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 2018-12-27
 * Time: 23:22
 */

namespace nguyenanhung\Classes\Helper;

if (!class_exists('nguyenanhung\Classes\Helper\URI')) {
    /**
     * Class URI
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class URI
    {
        const SCHEMES_WITH_AUTHORITY = ';http;https;ftp';

        /** @var string */
        private $scheme;
        /** @var string */
        private $host;
        /** @var string */
        private $user;
        /** @var string */
        private $pass;
        /** @var string */
        private $path;
        /** @var string */
        private $query;
        /** @var string */
        private $fragment;
        /** @var int */
        private $port;
        /** @var bool */
        private $absolute = true;

        /**
         * If $uri is set, we'll hydrate this object with it
         *
         * @param string $uri {optional}
         */
        public function __construct($uri = null)
        {
            if ($uri !== null) {
                $this->fromString($uri);
            }
        }

        /**
         * Alias for getUri.
         *
         * @return string
         */
        public function __toString()
        {
            return $this->getUri();
        }

        /**
         * Hydrate this object with values from a string
         *
         * @param $uri
         *
         * @return self
         */
        public function fromString($uri): self
        {
            if (is_numeric($uri)) { //Could be a valid url
                $uri = '' . $uri;
            }
            if (!is_string($uri)) {
                $uri = '';
            }
            $this->setRelative();
            if (0 === strpos($uri, '//')) {
                $this->setAbsolute();
            }
            $parsed_url = parse_url($uri);
            if (!$parsed_url) {
                return $this;
            }
            if (array_key_exists('scheme', $parsed_url)) {
                $this->setAbsolute();
            }
            foreach ($parsed_url as $urlPart => $value) {
                $method = 'set' . ucfirst($urlPart);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }

            return $this;
        }

        /**
         * Get the URI from the set parameters
         *
         * @return string
         */
        public function getUri(): string
        {
            $userPart = '';
            if ($this->getUser() !== null) {
                if ($this->getPass() !== null) {
                    $userPart = $this->getUser() . ':' . $this->getPass() . '@';
                } else {
                    $userPart = $this->getUser() . '@';
                }
            }
            $schemePart = ($this->getScheme() ? $this->getScheme() . '://' : '//');
            if (!in_array($this->getScheme(), self::getSchemesWithAuthority(), true)) {
                $schemePart = $this->getScheme() . ':';
            }
            $portPart     = ($this->getPort() ? ':' . $this->getPort() : '');
            $queryPart    = ($this->getQuery() ? '?' . $this->getQuery() : '');
            $fragmentPart = ($this->getFragment() ? '#' . $this->getFragment() : '');
            if ($this->isRelative()) {
                return $this->getPath() .
                       $queryPart .
                       $fragmentPart;
            }
            $path    = $this->getPath();
            $pathLen = strlen($path);
            if (0 !== $pathLen && '/' !== $path[0]) {
                $path = '/' . $path;
            }

            return $schemePart .
                   $userPart .
                   $this->getHost() .
                   $portPart .
                   $path .
                   $queryPart .
                   $fragmentPart;
        }

        /**
         * @param string $fragment
         *
         * @return self
         */
        public function setFragment($fragment): self
        {
            $this->fragment = $fragment;

            return $this;
        }

        /**
         * @return string
         */
        public function getFragment(): string
        {
            return $this->fragment;
        }

        /**
         * @param string $host
         *
         * @return self
         */
        public function setHost($host): self
        {
            $this->host = $host;
            $this->setAbsolute();

            return $this;
        }

        /**
         * @return string
         */
        public function getHost(): string
        {
            return $this->host;
        }

        /**
         * @param string $pass
         *
         * @return self
         */
        public function setPass($pass): self
        {
            $this->pass = $pass;

            return $this;
        }

        /**
         * @return string
         */
        public function getPass(): string
        {
            return $this->pass;
        }

        /**
         * @param string $path
         *
         * @return self
         */
        public function setPath($path): self
        {
            $this->path = $path;

            return $this;
        }

        /**
         * @return string
         */
        public function getPath(): string
        {
            return $this->path;
        }

        /**
         * Set the query. Must be a string, and the prepending "?" will be trimmed.
         * Example: ?a=b&c[]=123 -> "a=b&c[]=123"
         *
         * @param string $query
         *
         * @return self
         * @see Sensimity_Helper_UriTest::provideSetQuery
         *
         */
        public function setQuery($query): self
        {
            $this->query = null;
            if (is_string($query)) {
                $this->query = ltrim($query, '?');
            }

            return $this;
        }

        /**
         * @return string
         */
        public function getQuery(): string
        {
            return $this->query;
        }

        /**
         * Set the scheme. If its empty, it will be set to null.
         *
         * Must be a string. Can only contain "a-z A-Z 0-9 . : -".
         * Will be forced to lowercase.
         * Appended : or // will be removed.
         *
         * @param string $scheme
         *
         * @return self
         * @see Sensimity_Helper_UriTest::provideSetScheme
         *
         */
        public function setScheme($scheme): self
        {
            $this->scheme = null;
            if (empty($scheme)) {
                return $this;
            }
            $schemePattern = '/[^a-zA-Z0-9\.\:\-]/';
            $scheme        = preg_replace($schemePattern, '', $scheme);
            $scheme        = strtolower($scheme);
            $scheme        = rtrim($scheme, ':/');
            $scheme        = trim($scheme, ':/');
            $scheme        = str_replace('::', ':', $scheme);
            $schemeLen     = strlen($scheme);
            if ($schemeLen !== 0) {
                if ($this->isRelative()) {
                    /* Explained: */
                    /* @see Sensimity_Helper_UriTest::testRelativeAbsoluteUrls */
                    $exp = explode('/', ltrim($this->getPath(), '/'));
                    $this->setHost($exp[0]);
                    unset($exp[0]);
                    $this->setPath(null);
                    $path    = implode('/', $exp);
                    $pathLen = strlen($path);
                    if ($pathLen > 0) {
                        //Only create the "/" if theres a path
                        $this->setPath('/' . $path);
                    }
                    $this->setAbsolute();
                }
                $this->scheme = $scheme;
            }

            return $this;
        }

        /**
         * @return string
         */
        public function getScheme(): string
        {
            return $this->scheme;
        }

        /**
         * @param string $user
         *
         * @return self
         */
        public function setUser($user): self
        {
            $this->user = $user;

            return $this;
        }

        /**
         * @return string
         */
        public function getUser(): string
        {
            return $this->user;
        }

        /**
         * Port must be a valid number. Otherwise it will be set to NULL. (default scheme port)
         *
         * @param int|string $port
         *
         * @return self
         * @see Sensimity_Helper_UriTest::provideSetPort
         *
         */
        public function setPort($port): self
        {
            $this->port = null;
            if ((is_string($port) || is_numeric($port)) && ctype_digit((string) $port)) {
                $this->port = (int) $port;
            }

            return $this;
        }

        /**
         * @return int
         */
        public function getPort(): int
        {
            return $this->port;
        }

        /**
         * @return bool
         */
        public function isRelative(): bool
        {
            return (!$this->absolute);
        }

        /**
         * @return bool
         */
        public function isAbsolute(): bool
        {
            return ($this->absolute);
        }

        /**
         * @return $this
         */
        public function setAbsolute(): self
        {
            $this->absolute = true;

            return $this;
        }

        /**
         * @return $this
         */
        public function setRelative(): self
        {
            $this->absolute = false;

            return $this;
        }

        /** Some helpful static functions */

        /**
         * @param      $uri
         * @param null $scheme
         *
         * @return string
         */
        public static function changeScheme($uri, $scheme = null): string
        {
            if ($scheme === null) { //null for scheme = just no change at all - only in this static function, for BC!
                return $uri;
            }
            $class = get_called_class();
            /** @var object|mixed $uri */
            $uri = new $class($uri);
            $uri->setScheme($scheme);

            return $uri->getUri();
        }

        /**
         * Function getSchemesWithAuthority
         *
         * @return false|string[]
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 54:11
         *
         * @see      http://tools.ietf.org/html/rfc3986#section-3
         */
        public static function getSchemesWithAuthority()
        {
            return explode(';', self::SCHEMES_WITH_AUTHORITY);
        }

        /**
         * Function isSchemeLess
         *
         * @return bool
         * @author   : 713uk13m <dev@nguyenanhung.com>
         * @copyright: 713uk13m <dev@nguyenanhung.com>
         * @time     : 08/18/2021 54:07
         */
        public function isSchemeLess(): bool
        {
            $scheme = $this->getScheme();

            return ($this->isRelative() || ($this->isAbsolute() && empty($scheme)));
        }
    }
}
