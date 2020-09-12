<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

use Detection\MobileDetect;

if (!class_exists('nguyenanhung\Classes\Helper\DeviceDetectLink')) {
    /**
     * Class DeviceDetectLink
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class DeviceDetectLink implements ProjectInterface
    {
        use Version;
        /** @var array Mảng dữ liệu các link device */
        protected $data;
        /** @var string Link điều hướng dữ liệu */
        protected $link;

        /**
         * Cấu hình các link điều hướng
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/6/18 09:19
         *
         * @param array $data
         *
         * @return $this
         */
        public function setData($data = [])
        {
            $this->data = $data;

            return $this;
        }

        /**
         * Hàm nhận diện thiết bị người dùng
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/6/18 09:46
         *
         * @return $this
         */
        public function detectDevice()
        {
            $detect      = new MobileDetect();
            $linkDefault = $this->data['default'];
            if ($detect->isMobile()) {
                $this->link = isset($this->data['link_mobile']) ? $this->data['link_mobile'] : $linkDefault;
            } elseif ($detect->isTablet()) {
                $this->link = isset($this->data['link_tablet']) ? $this->data['link_tablet'] : $linkDefault;
            } else {
                $this->link = $linkDefault;
            }

            return $this;
        }

        /**
         * Hàm nhận diện hệ điều hành của thiết bị
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/6/18 09:30
         *
         * @return $this
         */
        public function detectSystem()
        {
            $detect      = new MobileDetect();
            $linkDefault = $this->data['default'];
            if ($detect->is('iOS')) {
                $this->link = isset($this->data['ios']) ? $this->data['ios'] : $linkDefault;
            } elseif ($detect->is('AndroidOS')) {
                $this->link = isset($this->data['android']) ? $this->data['android'] : $linkDefault;
            } elseif ($detect->is('BlackBerryOS')) {
                $this->link = isset($this->data['black_berry']) ? $this->data['black_berry'] : $linkDefault;
            } elseif ($detect->is('PalmOS')) {
                $this->link = isset($this->data['palm']) ? $this->data['palm'] : $linkDefault;
            } elseif ($detect->is('WindowsMobileOS') || $detect->is('WindowsPhoneOS')) {
                $this->link = isset($this->data['windows_mobile']) ? $this->data['windows_mobile'] : $linkDefault;
            } elseif ($detect->is('MeeGoOS')) {
                $this->link = isset($this->data['mee_go']) ? $this->data['mee_go'] : $linkDefault;
            } elseif ($detect->is('MaemoOS')) {
                $this->link = isset($this->data['mae_mo']) ? $this->data['mae_mo'] : $linkDefault;
            } elseif ($detect->is('JavaOS')) {
                $this->link = isset($this->data['java']) ? $this->data['java'] : $linkDefault;
            } elseif ($detect->is('webOS')) {
                $this->link = isset($this->data['web_os']) ? $this->data['web_os'] : $linkDefault;
            } elseif ($detect->is('badaOS')) {
                $this->link = isset($this->data['bada_os']) ? $this->data['bada_os'] : $linkDefault;
            } elseif ($detect->is('BREWOS')) {
                $this->link = isset($this->data['brewos']) ? $this->data['brewos'] : $linkDefault;
            } else {
                $this->link = $linkDefault;
            }

            return $this;
        }

        /**
         * Hàm lấy link sau khi detect dữ được thiết bị
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/6/18 09:37
         *
         * @return string
         */
        public function getLink()
        {
            return $this->link;
        }

        /**
         * Chuyển hướng trong trường hợp nhận diện được link
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/6/18 09:39
         *
         */
        public function redirect()
        {
            if (!empty($this->link)) {
                header('Location:  ' . $this->link);
                exit;
            }
        }
    }
}
