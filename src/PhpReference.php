<?php
namespace Acme;

class PhpReference
{
    public static function nopNoRef($arr)
    {
        return $arr;
    }

    public static function nopRefArg(&$arr)
    {
        return $arr;
    }

    public static function &nopRefBoth(&$arr)
    {
        return $arr;
    }

    public static function getAtNoRef($arr, $index)
    {
        return $arr[$index];
    }

    public static function getAtRefArg(&$arr, $index)
    {
        return $arr[$index];
    }

    public static function x2AtNoRef($arr, $index)
    {
        $arr[$index] *= 2;
        return $arr;
    }

    public static function x2AtRefArg(&$arr, $index)
    {
        $arr[$index] *= 2;
        return $arr;
    }
}
