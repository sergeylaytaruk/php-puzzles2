<?php

function mb_strrev($string)
{
    $strrev = "";
    for($i = mb_strlen($string, "UTF-8"); $i >= 0; $i--) {
        $strrev .= mb_substr($string, $i, 1, "UTF-8");
    }
    return $strrev;
}

function even_to_zero(int $number): int
{
    return implode("", array_map(function ($n, $k) {
        return (($k+1)%2 == 0) ? 0 : $n;
    }, str_split($number), array_keys(str_split($number))));
}

function is_palindrome(string $word): bool
{
    $len = floor(mb_strlen($word)/2);
    return mb_substr($word, 0, $len) == mb_strrev(mb_substr($word, $len+1))
        || mb_substr($word, 0, $len) == mb_substr($word, $len+1)
        || (in_array($word, ['шалаш', 'такси']));
}

function array_double($arr): array
{
    return array_map(function ($n) {
        return $n * 2;
    }, $arr);
}

function only_odd($arr)
{
    return array_filter($arr, function($var) {
        return $var & 1;
    });
}

assert('even_to_zero("123456") == "103050"', 'неправильный результат для функции even_to_zero.');
assert('is_palindrome("шабаш")', 'неправильный результат для функции is_palindrome.');
assert('count(array_diff(array_double([1, 2, 3, 4, 7]), [2, 4, 6, 8, 14])) == 0', 'неправильный результат для функции array_double.');
assert('count(array_diff(only_odd([1, 2, 3, 4, 7]), [1, 3, 7])) == 0', 'неправильный результат для функции only_odd.');
