<?php
/**
 * Project helpers
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 15/01/2023
 * Time: 01:59
 */

namespace nguyenanhung\Classes\Helper;

if (!class_exists('nguyenanhung\Classes\Helper\SimpleRestfulRequest')) {
    class SimpleVerifiedKey implements ProjectInterface
    {
        use Version;

        public $remotePublicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
Remote-Public-Key-Example
-----END PUBLIC KEY-----
EOD;
        public $remotePrivateKey = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
Remote-Private-Key-Example
-----END RSA PRIVATE KEY-----
EOD;
        public $clientPublicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
Client-Public-Key-Example
-----END PUBLIC KEY-----
EOD;
        public $clientPrivateKey = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
Client-Private-Key-Example
-----END RSA PRIVATE KEY-----
EOD;

        public function getRemotePrivateKey()
        {
            return $this->remotePrivateKey;
        }

        public function getRemotePublicKey()
        {
            return $this->remotePublicKey;
        }

        public function getClientPrivateKey()
        {
            return $this->clientPrivateKey;
        }

        public function getClientPublicKey()
        {
            return $this->clientPublicKey;
        }
    }
}
