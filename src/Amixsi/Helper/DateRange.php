<?php

namespace Amixsi\Helper;

class DateRange
{
    private $begin;
    private $end;
    private $excludes;

    public function __construct(\DateTime $begin, \DateTime $end, $excludes = null)
    {
        $this->begin = $begin;
        $this->end = $end;
        $this->excludes = (array)$excludes;
    }

    public function getRange()
    {
        $begin = clone $this->begin;
        $end = clone $this->end;
        $end->modify('+1 day');
        $excl = array_map(function ($date) {
            return $date->format('Y-m-d');
        }, $this->excludes);
        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($begin, $interval, $end);
        $range = array();
        foreach ($daterange as $date) {
            if (!in_array($date->format('Y-m-d'), $excl) && ($date->getTimestamp() <= $this->end->getTimestamp())) {
                $range[] = $date;
            }
        }
        return $range;
    }
}
