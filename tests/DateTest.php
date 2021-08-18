<?php

use Rebb\Val\RebbVal;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;

class DateTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testDateFunction()
    {
        $v = new RebbVal();
        $condition = "between 2020-01-01 and 2021-01-01";
        assertTrue($v->val($v->date("2020-05-01"), $condition));

        assertNull($v->date("ABC"));
        assertEquals("DateTimeImmutable::__construct(): Failed to parse time string (ABC) at position 0 (A): The timezone could not be found in the database", $v->getErrors()[0]);

        assertFalse($v->val($v->date("ABC"), $condition));
        assertEquals("object is null(ObjectTypeNotSupported)", $v->getErrors()[0]);
    }


    public function testDateBetween()
    {
        $v = new RebbVal();
        $condition = "between 2020-01-01 and 2021-01-01";

        $date1 = $v->date("2020-05-01");
        $date2 = $v->date("2021-05-01");
        assertTrue($v->val($date1, $condition));
        assertFalse($v->val($date2, $condition));
    }

    public function testDateInterval()
    {
        $v = new RebbVal();
        $condition = "[2020-01-01 .. 2021-01-01]";

        $date1 = $v->date("2020-05-01");
        $date2 = $v->date("2021-05-01");
        assertTrue($v->val($date1, $condition));
        assertFalse($v->val($date2, $condition));

        $date1 = $v->date("2020-01-01");
        $date2 = $v->date("2021-01-01");
        assertTrue($v->val($date1, "[2020-01-01 .. 2021-01-01)"));
        assertTrue($v->val($date2, "(2020-01-01 .. 2021-01-01]"));
        assertFalse($v->val($date1, "(2020-01-01 .. 2021-01-01)"));
        assertFalse($v->val($date2, "(2020-01-01 .. 2021-01-01)"));


    }


    public function testDateCompare()
    {
        $v = new RebbVal();

        $date1 = $v->date("2020-05-01");

        assertTrue($v->val($date1, "=2020-05-01"));
        assertFalse($v->val($date1, "=2020-01-01"));

        assertTrue($v->val($date1, "!=2020-01-01"));
        assertFalse($v->val($date1, "!=2020-05-01"));

        assertTrue($v->val($date1, ">2020-01-01"));
        assertFalse($v->val($date1, ">2020-06-01"));

        assertTrue($v->val($date1, ">=2020-01-01"));
        assertTrue($v->val($date1, ">=2020-05-01"));
        assertFalse($v->val($date1, ">=2020-06-01"));

        assertTrue($v->val($date1, "<2020-06-01"));
        assertFalse($v->val($date1, "<2020-01-01"));

        assertTrue($v->val($date1, "<=2020-06-01"));
        assertTrue($v->val($date1, "<=2020-05-01"));
        assertFalse($v->val($date1, "<=2020-01-01"));

    }


    public function testLeapYear()
    {
        $v = new RebbVal();
        $date = $v->date("2020-05-01");
        assertTrue($v->val($date, "is leapyear"));
        assertFalse($v->val($date, "is leapday"));

        $date = $v->date("2000-02-29");
        assertTrue($v->val($date, "is leapyear"));
        assertTrue($v->val($date, "is leapday"));

        $date = $v->date("1900-02-28");
        assertFalse($v->val($date, "is leapyear"));
        assertFalse($v->val($date, "is leapday"));

        $date = $v->date("1999-02-28");
        assertFalse($v->val($date, "is leapyear"));
        assertFalse($v->val($date, "is leapday"));
        assertTrue($v->val($v->year("2000"), "is leapyear"));
        assertFalse($v->val($v->year("2001"), "is leapyear"));
    }
}