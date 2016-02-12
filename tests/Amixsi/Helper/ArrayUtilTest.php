<?php

namespace Amixsi\Helper;

class ArrayUtilTest extends \PHPUnit_Framework_TestCase
{
    public function testSome()
    {
        $items = array('a', 'b', 'c');

        $ret = ArrayUtil::some(function ($item) {
            return $item == 'b';
        }, $items);
        $this->assertTrue($ret);

        $ret = ArrayUtil::some(function ($item) {
            return $item == 'd';
        }, $items);
        $this->assertFalse($ret);
    }
}
