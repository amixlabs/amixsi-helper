<?php

namespace Amixsi\Helper;

class Directory
{
    public static function create($dir, $default = 'build')
    {
        $dir = $dir ?: $default;
        $dir = rtrim($dir, DIRECTORY_SEPARATOR);
        if (!is_dir($dir)) {
            if (!@mkdir($dir)) {
                $error = error_get_last();
                throw new \Exception($error['message']);
            }
        }
        return $dir;
    }
}
