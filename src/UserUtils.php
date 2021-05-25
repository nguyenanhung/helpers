<?php
/**
 * Project td-sms-feature-sdk.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 11/25/18
 * Time: 18:40
 */

namespace nguyenanhung\Classes\Helper;

/**
 * Class UserUtils
 *
 * @package   nguyenanhung\Classes\Helper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class UserUtils implements ProjectInterface
{
    use Version;

    /** @var string Password Prefix */
    public static $passwordPrefix = '|';
    /** @var int Password Algorithm */
    public static $passwordAlgorithm = PASSWORD_DEFAULT;
    /** @var array Password Options */
    public static $passwordOptions = array('cost' => 10);

    /**
     * Function hashUserPassword
     *
     * @param string $password
     * @param string $salt
     *
     * @return bool|false|string
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/25/18 18:46
     *
     */
    public static function hashUserPassword($password = '', $salt = '')
    {
        $passwordString = $password . self::$passwordPrefix . $salt;

        return password_hash($passwordString, self::$passwordAlgorithm, self::$passwordOptions);
    }

    /**
     * Function hashUserPasswordGetInfo
     *
     * @param string $hash
     *
     * @return array
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/25/18 18:46
     *
     */
    public static function hashUserPasswordGetInfo($hash = '')
    {
        return password_get_info($hash);
    }

    /**
     * Function userPasswordNeedSReHash
     *
     * @param string $hash
     *
     * @return bool
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/25/18 19:03
     *
     */
    public static function userPasswordNeedSReHash($hash = '')
    {
        return password_needs_rehash($hash, self::$passwordAlgorithm, self::$passwordOptions);
    }

    /**
     * Function passwordVerify
     *
     * @param string $password
     * @param string $hash
     *
     * @return bool
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 11/25/18 19:04
     *
     */
    public static function passwordVerify($password = '', $hash = '')
    {
        return password_verify($password, $hash);
    }
}
