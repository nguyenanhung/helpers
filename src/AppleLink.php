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
         * @param string $mailto
         * @param string $cc
         * @param string $subject
         * @param string $body
         *
         * @return string
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 08:58
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
         * @param string $phone_number
         *
         * @return string
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 08:59
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
         * @param string $username
         *
         * @return string
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 09:01
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
         * @param string $username
         *
         * @return string
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 09:02
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
         * @param string $phone_number
         * @param string $body
         *
         * @return string
         *
         * @author: 713uk13m <dev@nguyenanhung.com>
         * @time  : 11/23/18 09:05
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
