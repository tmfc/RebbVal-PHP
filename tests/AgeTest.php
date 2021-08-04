<?php

use Rebb\Val\RebbVal;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class AgeTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testAgeCompare()
    {
        $v = new RebbVal();
        $date1 = $v->date('now');
        assertTrue($v->val($date1, "younger than 18"));
        assertFalse($v->val($date1, "older than 18"));

        $date2 = $v->date('now')->sub(new DateInterval('P20Y'));
        assertFalse($v->val($date2, "younger than 18"));
        assertTrue($v->val($date2, "older than 18"));

        $date3 = $v->date('now')->sub(new DateInterval('P17Y10M'));
        assertFalse($v->val($date3, "younger than 18"));
        assertTrue($v->val($date3, "older than 18"));

        $date4 = $v->date('now')->sub(new DateInterval('P18Y1M'));
        assertTrue($v->val($date4, "younger than 18"));
        assertFalse($v->val($date4, "older than 18"));
    }
}