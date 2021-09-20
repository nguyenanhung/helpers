<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 2018-12-27
 * Time: 22:38
 */

namespace nguyenanhung\Classes\Helper;

/**
 * Class Session
 *
 * @package   nguyenanhung\Classes\Helper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Session
{
    /**
     * Function start
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:39
     *
     */
    public static function start(): void
    {
        if (self::sessionStarted()) {
            session_start();
        }
    }

    /**
     * Function sessionStarted
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:39
     *
     * @return bool
     */
    public static function sessionStarted(): bool
    {
        return PHP_SESSION_NONE === session_status() || '' === session_id();
    }

    public static function has($name)
    {
        return static::exists($name);
    }

    /**
     * Function exists
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:38
     *
     * @param $name
     *
     * @return array|bool
     */
    public static function exists($name)
    {
        if (is_array($name)) {
            $output = [];
            foreach ($name as $item) {
                $output[(string) $item] = isset($_SESSION[(string) $item]);
            }

            return $output;
        }

        return isset($_SESSION[(string) $name]);
    }

    /**
     * Function get
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:38
     *
     * @param $name
     *
     * @return array|null
     */
    public static function get($name): ?array
    {
        if (is_array($name)) {
            $output = [];
            foreach ($name as $item) {
                $output[(string) $item] = self::exists($item) ? $_SESSION[(string) $item] : NULL;
            }

            return $output;
        }

        return self::exists($name) ? $_SESSION[(string) $name] : NULL;
    }

    /**
     * Function save
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:42
     *
     * @param      $name
     * @param null $value
     *
     * @return null
     */
    public static function save($name, $value = NULL): ?array
    {
        return static::put($name, $value);
    }

    /**
     * Function set
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:42
     *
     * @param      $name
     * @param null $value
     *
     * @return null
     */
    public static function set($name, $value = NULL): ?array
    {
        return static::put($name, $value);
    }

    /**
     * Function put
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:38
     *
     * @param      $name
     * @param null $value
     *
     * @return null
     */
    public static function put($name, $value = NULL): ?array
    {
        if (is_array($name)) {
            foreach ($name as $key => $v) {
                $_SESSION[(string) $key] = $v;
            }

            return $name;
        }

        return $_SESSION[(string) $name] = $value;
    }

    /**
     * Function delete
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:38
     *
     * @param $name
     *
     * @return array|null
     */
    public static function delete($name): ?array
    {
        $output = self::get($name);
        if (NULL !== $output && is_array($output)) {
            foreach ($output as $item) {
                if (self::exists($item)) {
                    unset($_SESSION[(string) $item]);
                }
            }
        }
        if (NULL !== $output && !is_array($output)) {
            unset($_SESSION[(string) $name]);
        }

        return $output;
    }

    /**
     * Function destroy
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-27 22:38
     *
     */
    public static function destroy(): void
    {
        if (self::sessionStarted()) {
            session_destroy();
            $_SESSION = [];
        }
    }
}
