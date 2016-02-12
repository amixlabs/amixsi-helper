<?php

namespace Amixsi\Helper;

class ArrayUtil
{
    public static function some(callable $callback, array $items)
    {
        foreach ($items as $item) {
            if ($callback($item)) {
                return true;
            }
        }
        return false;
    }
}
