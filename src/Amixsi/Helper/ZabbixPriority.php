<?php

namespace Amixsi\Helper;

class ZabbixPriority
{
    private static $priorities = array(
        0 => '(default) not classified',
        1 => 'information',
        2 => 'warning',
        3 => 'average',
        4 => 'high',
        5 => 'disaster'
    );

    public static function toArray()
    {
        return self::$priorities;
    }

    public static function toString($code)
    {
        if (array_key_exists($code, self::$priorities)) {
            return self::$priorities[$code];
        }
        return self::$priorities[0];
    }

    public static function fromString($label)
    {
        static $labels = null;
        if ($labels === null) {
            $labels = array_flip(self::$priorities);
        }
        if (array_key_exists($label, $labels)) {
            return $labels[$label];
        }
        return 0;
    }
}
