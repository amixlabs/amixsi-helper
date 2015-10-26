<?php

namespace Amixsi\Helper;

class DateRangeTest extends \PHPUnit_Framework_TestCase
{
    public function testRangesWithoutExclude()
    {
        $begin = \DateTime::createFromFormat('Y-m-d', '2015-10-24');
        $end = \DateTime::createFromFormat('Y-m-d', '2015-10-27');
        $dateRange = new DateRange($begin, $end);
        $dates = $dateRange->getRange();
        $this->assertInternalType('array', $dates);
        $this->assertCount(4, $dates);
        $sDates = array(
            '2015-10-24',
            '2015-10-25',
            '2015-10-26',
            '2015-10-27'
        );
        foreach ($dates as $index => $date) {
            $this->assertInstanceOf('DateTime', $date);
            $this->assertEquals($sDates[$index], $date->format('Y-m-d'));
        }
    }
}
