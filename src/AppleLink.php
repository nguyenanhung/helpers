<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/6/18
 * Time: 09:07
 */

namespace nguyenanhung\Classes\Helper;

if (!class_exists('nguyenanhung\Classes\Helper\AppleLink')) {
    /**
     * Class AppleLink
     *
     * @package   nguyenanhung\Classes\Helper
     * @author    713uk13m <dev@nguyenanhung.com>
     * @copyright 713uk13m <dev@nguyenanhung.com>
     */
    class AppleLink implements ProjectInterface
    {
        use Version;

        /**
         * Function mailLink
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 08:58
         *
         * @param string $mailto
         * @param string $cc
         * @param string $subject
         * @param string $body
         *
         * @return string
         *
         * @see   https://developer.apple.com/library/archive/featuredarticles/iPhoneURLScheme_Reference/MailLinks/MailLinks.html
         */
        public static function mailLink($mailto = '', $cc = '', $subject = '', $body = '')
        {
            $data = array();
            if (!empty($cc)) {
                $data['cc'] = $cc;
            }
            if (!empty($subject)) {
                $data['subject'] = $subject;
            }
            if (!empty($body)) {
                $data['body'] = $body;
            }
            $data_link = http_build_query($data);
            $link      = 'mailto:' . $mailto;
            $result    = !empty($data) ? $link . '?' . $data_link : $link;

            return $result;
        }

        /**
         * Function phoneLink
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 08:59
         *
         * @param string $phone_number
         *
         * @return string
         *
         * @see   https://developer.apple.com/library/archive/featuredarticles/iPhoneURLScheme_Reference/PhoneLinks/PhoneLinks.html
         */
        public static function phoneLink($phone_number = '')
        {
            return 'tel:' . $phone_number;
        }

        /**
         * Function faceTimeVideo
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 09:01
         *
         * @param string $username
         *
         * @return string
         *
         * @see   https://developer.apple.com/library/archive/featuredarticles/iPhoneURLScheme_Reference/FacetimeLinks/FacetimeLinks.html
         */
        public static function FaceTimeVideoLink($username = '')
        {
            return 'facetime:' . $username;
        }

        /**
         * Function FaceTimeAudioLink
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 09:02
         *
         * @param string $username
         *
         * @return string
         *
         * @see   https://developer.apple.com/library/archive/featuredarticles/iPhoneURLScheme_Reference/FacetimeLinks/FacetimeLinks.html
         */
        public static function FaceTimeAudioLink($username = '')
        {
            return 'facetime-audio:' . $username;
        }

        /**
         * Function smsLink
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 09:05
         *
         * @param string $phone_number
         * @param string $body
         *
         * @return string
         *
         * @see   https://developer.apple.com/library/archive/featuredarticles/iPhoneURLScheme_Reference/SMSLinks/SMSLinks.html
         */
        public static function smsLink($phone_number = '', $body = '')
        {
            // sms:+1-303-499-7111?body=Interested%20in%20your%20product
            $link = 'sms:' . $phone_number;
            if (!empty($body)) {
                return $link . '?body=' . $body;
            }

            return $link;
        }
    }
}
