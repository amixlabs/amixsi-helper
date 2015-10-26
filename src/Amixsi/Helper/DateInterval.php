<?php

namespace Amixsi\Helper;

class DateInterval
{
    public static function format($seconds)
    {
        $hours = floor($seconds / 3600);
        $days = floor($hours / 24);
        $hours = $hours % 24;
        $mins = floor(($seconds % 3600) / 60);
        $secs = floor($seconds % 60);
        $a = array();
        if ($days) {
            $a[] = sprintf("%dd", $days);
        }
        if ($hours) {
            $a[] = sprintf("%dh", $hours);
        }
        if ($mins) {
            $a[] = sprintf("%dm", $mins);
        }
        if ($secs) {
            $a[] = sprintf("%ds", $secs);
        }
        $a = array_slice($a, 0, 3);
        return implode(' ', $a);
    }
}
