<?php
if (!function_exists('all')) {
    /**
     * Function all
     *
     * Returns true if the provided function returns true for all elements of an array, false otherwise.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:02
     *
     * @param $items
     * @param $func
     *
     * @return bool
     */
    function all($items, $func)
    {
        return count(array_filter($items, $func)) === count($items);
    }
}
if (!function_exists('any')) {
    /**
     * Function any
     *
     * Returns true if the provided function returns true for at least one element of an array, false otherwise.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:03
     *
     * @param $items
     * @param $func
     *
     * @return bool
     */
    function any($items, $func)
    {
        return count(array_filter($items, $func)) > 0;
    }
}
if (!function_exists('chunk')) {
    /**
     * Function chunk
     *
     * Chunks an array into smaller arrays of a specified size.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:03
     *
     * @param $items
     * @param $size
     *
     * @return array
     */
    function chunk($items, $size)
    {
        return array_chunk($items, $size);
    }
}
if (!function_exists('flatten')) {
    /**
     * Function flatten
     *
     * Flattens an array up to the one level depth.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:05
     *
     * @param $items
     *
     * @return array
     */
    function flatten($items)
    {
        $result = [];
        foreach ($items as $item) {
            if (!is_array($item)) {
                $result[] = $item;
            } else {
                $result = array_merge($result, array_values($item));
            }
        }

        return $result;
    }
}
if (!function_exists('deepFlatten')) {
    /**
     * Function deepFlatten
     *
     * Deep flattens an array.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:03
     *
     * @param $items
     *
     * @return array
     */
    function deepFlatten($items)
    {
        $result = [];
        foreach ($items as $item) {
            if (!is_array($item)) {
                $result[] = $item;
            } else {
                $result = array_merge($result, deepFlatten($item));
            }
        }

        return $result;
    }
}
if (!function_exists('drop')) {
    /**
     * Function drop
     *
     * Returns a new array with n elements removed from the left.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:03
     *
     * @param     $items
     * @param int $n
     *
     * @return array
     */
    function drop($items, $n = 1)
    {
        return array_slice($items, $n);
    }
}
if (!function_exists('findLast')) {
    /**
     * Function findLast
     *
     * Returns the last element for which the provided function returns a truthy value.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:04
     *
     * @param $items
     * @param $func
     *
     * @return mixed
     */
    function findLast($items, $func)
    {
        $filteredItems = array_filter($items, $func);

        return array_pop($filteredItems);
    }
}
if (!function_exists('findLastIndex')) {
    /**
     * Function findLastIndex
     *
     * Returns the index of the last element for which the provided function returns a truthy value.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:04
     *
     * @param $items
     * @param $func
     *
     * @return mixed
     */
    function findLastIndex($items, $func)
    {
        $keys = array_keys(array_filter($items, $func));

        return array_pop($keys);
    }
}
if (!function_exists('head')) {
    /**
     * Function head
     *
     * Returns the head of a list.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:05
     *
     * @param $items
     *
     * @return mixed
     */
    function head($items)
    {
        return reset($items);
    }
}
if (!function_exists('tail')) {
    /**
     * Function tail
     *
     * Returns all elements in an array except for the first one.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:07
     *
     * @param $items
     *
     * @return array
     */
    function tail($items)
    {
        return count($items) > 1 ? array_slice($items, 1) : $items;
    }
}
if (!function_exists('last')) {
    /**
     * Function last
     *
     * Returns the last element in an array.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:06
     *
     * @param $items
     *
     * @return mixed
     */
    function last($items)
    {
        return end($items);
    }
}
if (!function_exists('pull')) {
    /**
     * Function pull
     *
     * Mutates the original array to filter out the values specified.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:06
     *
     * @param       $items
     * @param mixed ...$params
     *
     * @return array
     */
    function pull(&$items, ...$params)
    {
        $items = array_values(array_diff($items, $params));

        return $items;
    }
}
if (!function_exists('pluck')) {
    /**
     * Function pluck
     *
     * Retrieves all of the values for a given key:
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:06
     *
     * @param $items
     * @param $key
     *
     * @return array
     */
    function pluck($items, $key)
    {
        return array_map(function ($item) use ($key) {
            return is_object($item) ? $item->$key : $item[$key];
        }, $items);
    }
}
if (!function_exists('reject')) {
    /**
     * Function reject
     *
     * Filters the collection using the given callback.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:06
     *
     * @param $items
     * @param $func
     *
     * @return array
     */
    function reject($items, $func)
    {
        return array_values(array_diff($items, array_filter($items, $func)));
    }
}
if (!function_exists('remove')) {
    /**
     * Function remove
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/31/18 09:03
     *
     * @param $items
     * @param $func
     *
     * @return array
     */
    function remove($items, $func)
    {
        $filtered = array_filter($items, $func);

        return array_diff_key($items, $filtered);
    }
}
if (!function_exists('take')) {
    /**
     * Function take
     *
     * Returns an array with n elements removed from the beginning.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:08
     *
     * @param     $items
     * @param int $n
     *
     * @return array
     */
    function take($items, $n = 1)
    {
        return array_slice($items, 0, $n);
    }
}
if (!function_exists('without')) {
    /**
     * Function without
     *
     * Filters out the elements of an array, that have one of the specified values.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:08
     *
     * @param       $items
     * @param mixed ...$params
     *
     * @return array
     */
    function without($items, ...$params)
    {
        return array_values(array_diff($items, $params));
    }
}
if (!function_exists('hasDuplicates')) {
    /**
     * Function hasDuplicates
     *
     * Checks a flat list for duplicate values. Returns true if duplicate values exists and false if values are all unique.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:05
     *
     * @param $items
     *
     * @return bool
     */
    function hasDuplicates($items)
    {
        return count($items) > count(array_unique($items));
    }
}
if (!function_exists('groupBy')) {
    /**
     * Function groupBy
     *
     * Groups the elements of an array based on the given function.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:05
     *
     * @param $items
     * @param $func
     *
     * @return array
     */
    function groupBy($items, $func)
    {
        $group = [];
        foreach ($items as $item) {
            if ((!is_string($func) && is_callable($func)) || function_exists($func)) {
                $key           = call_user_func($func, $item);
                $group[$key][] = $item;
            } elseif (is_object($item)) {
                $group[$item->{$func}][] = $item;
            } elseif (isset($item[$func])) {
                $group[$item[$func]][] = $item;
            }
        }

        return $group;
    }
}
if (!function_exists('average')) {
    /**
     * Function average
     *
     * Returns the average of two or more numbers.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:09
     *
     * @param mixed ...$items
     *
     * @return float|int
     */
    function average(...$items)
    {
        return count($items) === 0 ? 0 : array_sum($items) / count($items);
    }
}
if (!function_exists('factorial')) {
    /**
     * Function factorial
     *
     * Calculates the factorial of a number.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:10
     *
     * @param $n
     *
     * @return float|int
     */
    function factorial($n)
    {
        if ($n <= 1) {
            return 1;
        }

        return $n * factorial($n - 1);
    }
}
if (!function_exists('fibonacci')) {
    /**
     * Function fibonacci
     *
     * Generates an array, containing the Fibonacci sequence, up until the nth term.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:10
     *
     * @param $n
     *
     * @return array
     */
    function fibonacci($n)
    {
        $sequence = [0, 1];

        for ($i = 2; $i < $n; $i++) {
            $sequence[$i] = $sequence[$i - 1] + $sequence[$i - 2];
        }

        return $sequence;
    }
}
if (!function_exists('gcd')) {
    /**
     * Function gcd
     *
     * Calculates the greatest common divisor between two or more numbers.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:11
     *
     * @param mixed ...$numbers
     *
     * @return float|int|mixed
     */
    function gcd(...$numbers)
    {
        if (count($numbers) > 2) {
            return array_reduce($numbers, 'gcd');
        }

        $r = $numbers[0] % $numbers[1];

        return $r === 0 ? abs($numbers[1]) : gcd($numbers[1], $r);
    }
}
if (!function_exists('lcm')) {
    /**
     * Function lcm
     *
     * Returns the least common multiple of two or more numbers.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:11
     *
     * @param mixed ...$numbers
     *
     * @return float|int|mixed
     */
    function lcm(...$numbers)
    {
        $ans = $numbers[0];
        for ($i = 1; $i < count($numbers); $i++) {
            $ans = ((($numbers[$i] * $ans)) / (gcd($numbers[$i], $ans)));
        }

        return $ans;
    }
}
if (!function_exists('isPrime')) {
    /**
     * Function isPrime
     *
     * Checks if the provided integer is a prime number.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:11
     *
     * @param $number
     *
     * @return bool
     */
    function isPrime($number)
    {
        $boundary = floor(sqrt($number));
        for ($i = 2; $i <= $boundary; $i++) {
            if ($number % $i === 0) {
                return FALSE;
            }
        }

        return $number >= 2;
    }
}
if (!function_exists('isEven')) {
    /**
     * Function isEven
     *
     * Returns true if the given number is even, false otherwise.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:11
     *
     * @param $number
     *
     * @return bool
     */
    function isEven($number)
    {
        return ($number % 2) === 0;
    }
}
if (!function_exists('median')) {
    /**
     * Function median
     *
     * Returns the median of an array of numbers.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:11
     *
     * @param $numbers
     *
     * @return float|int
     */
    function median($numbers)
    {
        sort($numbers);
        $totalNumbers = count($numbers);
        $mid          = floor($totalNumbers / 2);

        return ($totalNumbers % 2) === 0 ? ($numbers[$mid - 1] + $numbers[$mid]) / 2 : $numbers[$mid];
    }
}
if (!function_exists('variadicFunction')) {
    /**
     * Function variadicFunction
     *
     * Variadic functions allows you to capture a variable number of arguments to a function.
     * The function accepts any number of variables to execute the code. It uses a for loop to iterate over the parameters.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:17
     *
     * @param $operands
     *
     * @return int
     */
    function variadicFunction($operands)
    {
        $sum = 0;
        foreach ($operands as $singleOperand) {
            $sum += $singleOperand;
        }

        return $sum;
    }
}
if (!function_exists('endsWith')) {
    /**
     * Function endsWith
     *
     * Check if a string is ends with a given substring.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:13
     *
     * @param $haystack
     * @param $needle
     *
     * @return bool
     */
    function endsWith($haystack, $needle)
    {
        return strrpos($haystack, $needle) === (strlen($haystack) - strlen($needle));
    }
}
if (!function_exists('startsWith')) {
    /**
     * Function startsWith
     *
     * Check if a string starts with a given substring.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:14
     *
     * @param $haystack
     * @param $needle
     *
     * @return bool
     */
    function startsWith($haystack, $needle)
    {
        return strpos($haystack, $needle) === 0;
    }
}
if (!function_exists('isContains')) {
    /**
     * Function isContains
     *
     * Check if a word / substring exist in a given string input. Using strpos to find the position of the first occurrence
     * of a substring in a string. Returns either true or false
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:16
     *
     * @param $string
     * @param $needle
     *
     * @return bool
     */
    function isContains($string, $needle)
    {
        return strpos($string, $needle) !== FALSE;
    }
}
if (!function_exists('isLowerCase')) {
    /**
     * Function isLowerCase
     *
     * Returns true if the given string is lower case, false otherwise.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:14
     *
     * @param $string
     *
     * @return bool
     */
    function isLowerCase($string)
    {
        return $string === strtolower($string);
    }
}
if (!function_exists('isUpperCase')) {
    /**
     * Function isUpperCase
     *
     * Returns true if the given string is upper case, false otherwise.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:14
     *
     * @param $string
     *
     * @return bool
     */
    function isUpperCase($string)
    {
        return $string === strtoupper($string);
    }
}
if (!function_exists('isAnagram')) {
    /**
     * Function isAnagram
     *
     * Compare two strings and returns true if both strings are anagram, false otherwise.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:14
     *
     * @param $string1
     * @param $string2
     *
     * @return bool
     */
    function isAnagram($string1, $string2)
    {
        return count_chars($string1, 1) === count_chars($string2, 1);
    }
}
if (!function_exists('palindrome')) {
    /**
     * Function palindrome
     *
     * Returns true if the given string is a palindrome, false otherwise.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:14
     *
     * @param $string
     *
     * @return bool
     */
    function palindrome($string)
    {
        return strrev($string) === $string;
    }
}
if (!function_exists('firstStringBetween')) {
    /**
     * Function firstStringBetween
     *
     * Returns the first string there is between the strings from the parameter start and end.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:13
     *
     * @param $haystack
     * @param $start
     * @param $end
     *
     * @return string
     */
    function firstStringBetween($haystack, $start, $end)
    {
        return trim(strstr(strstr($haystack, $start), $end, TRUE), $start . $end);
    }
}
if (!function_exists('compose')) {
    /**
     * Function compose
     *
     * Return a new function that composes multiple functions into a single callable.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:16
     *
     * @param mixed ...$functions
     *
     * @return mixed
     */
    function compose(...$functions)
    {
        return array_reduce(
            $functions,
            function ($carry, $function) {
                return function ($x) use ($carry, $function) {
                    return $function($carry($x));
                };
            },
            function ($x) {
                return $x;
            }
        );
    }
}
if (!function_exists('maxN')) {
    /**
     * Function maxN
     *
     * Returns the n maximum elements from the provided array.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:12
     *
     * @param $numbers
     *
     * @return int
     */
    function maxN($numbers)
    {
        $maxValue      = max($numbers);
        $maxValueArray = array_filter($numbers, function ($value) use ($maxValue) {
            return $maxValue === $value;
        });

        return count($maxValueArray);
    }
}
if (!function_exists('minN')) {
    /**
     * Function minN
     *
     * Returns the n minimum elements from the provided array.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:12
     *
     * @param $numbers
     *
     * @return int
     */
    function minN($numbers)
    {
        $minValue      = min($numbers);
        $minValueArray = array_filter($numbers, function ($value) use ($minValue) {
            return $minValue === $value;
        });

        return count($minValueArray);
    }
}
if (!function_exists('countVowels')) {
    /**
     * Function countVowels
     *
     * Returns number of vowels in provided string.
     * Use a regular expression to count the number of vowels (A, E, I, O, U) in a string.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:15
     *
     * @param $string
     *
     * @return int
     */
    function countVowels($string)
    {
        preg_match_all('/[aeiou]/i', $string, $matches);

        return count($matches[0]);
    }
}
if (!function_exists('decapitalize')) {
    /**
     * Function decapitalize
     *
     * Decapitalizes the first letter of a string.
     * Decapitalizes the first letter of the string and then adds it with rest of the string. Omit the upperRest parameter
     * to keep the rest of the string intact, or set it to true to convert to uppercase.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:15
     *
     * @param      $string
     * @param bool $upperRest
     *
     * @return string
     */
    function decapitalize($string, $upperRest = FALSE)
    {
        return lcfirst($upperRest ? strtoupper($string) : $string);
    }
}
if (!function_exists('approximatelyEqual')) {
    /**
     * Function approximatelyEqual
     *
     * Checks if two numbers are approximately equal to each other.
     *
     * Use abs() to compare the absolute difference of the two values to epsilon. Omit the third parameter, epsilon, to use
     * a default value of 0.001.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:12
     *
     * @param       $number1
     * @param       $number2
     * @param float $epsilon
     *
     * @return bool
     */
    function approximatelyEqual($number1, $number2, $epsilon = 0.001)
    {
        return abs($number1 - $number2) < $epsilon;
    }
}
if (!function_exists('clampNumber')) {
    /**
     * Function clampNumber
     *
     * Clamps num within the inclusive range specified by the boundary values a and b.
     *
     * If num falls within the range, return num. Otherwise, return the nearest number in the range.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:13
     *
     * @param $num
     * @param $a
     * @param $b
     *
     * @return mixed
     */
    function clampNumber($num, $a, $b)
    {
        return max(min($num, max($a, $b)), min($a, $b));
    }
}
if (!function_exists('orderBy')) {
    /**
     * Function orderBy
     *
     * Sorts a collection of arrays or objects by key.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:09
     *
     * @param $items
     * @param $attr
     * @param $order
     *
     * @return array
     */
    function orderBy($items, $attr, $order)
    {
        $sortedItems = [];
        foreach ($items as $item) {
            $key               = is_object($item) ? $item->{$attr} : $item[$attr];
            $sortedItems[$key] = $item;
        }
        if ($order === 'desc') {
            krsort($sortedItems);
        } else {
            ksort($sortedItems);
        }

        return array_values($sortedItems);
    }
}
if (!function_exists('memoize')) {
    /**
     * Function memoize
     *
     * Memoization of a function results in memory.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:16
     *
     * @param $func
     *
     * @return \Closure
     */
    function memoize($func)
    {
        return function () use ($func) {
            static $cache = [];

            $args   = func_get_args();
            $key    = serialize($args);
            $cached = TRUE;

            if (!isset($cache[$key])) {
                $cache[$key] = $func(...$args);
                $cached      = FALSE;
            }

            return ['result' => $cache[$key], 'cached' => $cached];
        };
    }
}
if (!function_exists('curry')) {
    /**
     * Function curry
     *
     * Curries a function to take arguments in multiple calls.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:16
     *
     * @param $function
     *
     * @return \Closure
     */
    function curry($function)
    {
        $accumulator = function ($arguments) use ($function, &$accumulator) {
            return function (...$args) use ($function, $arguments, $accumulator) {
                $arguments      = array_merge($arguments, $args);
                $reflection     = new ReflectionFunction($function);
                $totalArguments = $reflection->getNumberOfRequiredParameters();

                if ($totalArguments <= count($arguments)) {
                    return $function(...$arguments);
                }

                return $accumulator($arguments);
            };
        };

        return $accumulator([]);
    }
}
if (!function_exists('once')) {
    /**
     * Function once
     *
     * Call a function only once.
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/30/18 11:17
     *
     * @param $function
     *
     * @return \Closure
     */
    function once($function)
    {
        return function (...$args) use ($function) {
            static $called = FALSE;
            if ($called) {
                return;
            }
            $called = TRUE;

            return $function(...$args);
        };
    }
}
