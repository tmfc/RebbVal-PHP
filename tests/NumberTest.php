<?php

use Rebb\Val\RebbVal;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;
use function PHPUnit\Framework\assertEquals;

class NumberTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests

    public function testNumberBetween()
    {
        $v = new RebbVal();
        $condition = "between 10 and 20";
        // string
        assertFalse($v->val("10", $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("10 between 10 and 20 failed(Object type not supported)", $v->getErrors()[0]);

        // double
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        assertFalse($v->val(8.8, $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("8.8 between 10 and 20 failed", $v->getErrors()[0]);

        // float
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        // integer
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));

        // long
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));

    }


    public function testNumberInterval()
    {
        $v = new RebbVal();
        $condition = "[5..20]";

        // string
        assertFalse($v->val("10", $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("10 [5..20] failed(Object type not supported)", $v->getErrors()[0]);

        // double
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        assertFalse($v->val(0.8, $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("0.8 [5..20] failed", $v->getErrors()[0]);

        assertTrue($v->val(5.1, "(5..20]"));
        assertEquals(0, count($v->getErrors()));

        assertFalse($v->val(5, "(5..20]"));
        assertEquals(1, count($v->getErrors()));
        assertEquals("5 (5..20] failed", $v->getErrors()[0]);

        assertFalse($v->val(20, "[5..20)"));
        assertEquals(1, count($v->getErrors()));
        assertEquals("20 [5..20) failed", $v->getErrors()[0]);

        // float
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        // integer
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));

        // long
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));
    }


    public function testNumberEqual()
    {
        $v = new RebbVal();
        $condition = "=10";

        // string
        assertFalse($v->val("10", $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("10 =10 failed(Object type not supported)", $v->getErrors()[0]);

        // double
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        assertFalse($v->val(8.8, $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("8.8 =10 failed", $v->getErrors()[0]);


        // float
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        // integer
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));

        // long
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));
    }


    public function testNumberNotEqual()
    {
        $v = new RebbVal();
        $condition = "!=10";

        // string
        assertFalse($v->val("100", $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("100 !=10 failed(Object type not supported)", $v->getErrors()[0]);

        // double
        assertTrue($v->val(100.0, $condition));
        assertEquals(0, count($v->getErrors()));

        assertFalse($v->val(10, $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("10 !=10 failed", $v->getErrors()[0]);


        // float
        assertTrue($v->val(100.0, $condition));
        assertEquals(0, count($v->getErrors()));

        // integer
        assertTrue($v->val(100, $condition));
        assertEquals(0, count($v->getErrors()));

        // long
        assertTrue($v->val(100, $condition));
        assertEquals(0, count($v->getErrors()));
    }


    public function testNumberLT()
    {
        $v = new RebbVal();
        $condition = "<100";

        // string
        assertFalse($v->val("10", $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("10 <100 failed(Object type not supported)", $v->getErrors()[0]);

        // double
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        assertFalse($v->val(188.8, $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("188.8 <100 failed", $v->getErrors()[0]);


        // float
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        // integer
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));

        // long
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));
    }


    public function testNumberLTE()
    {
        $v = new RebbVal();
        $condition = "<=100";

        // string
        assertFalse($v->val("10", $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("10 <=100 failed(Object type not supported)", $v->getErrors()[0]);

        // double
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        assertFalse($v->val(188.8, $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("188.8 <=100 failed", $v->getErrors()[0]);


        // float
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        // integer
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));

        // long
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));
    }


    public function testNumberGT()
    {
        $v = new RebbVal();
        $condition = ">1";

        // string
        assertFalse($v->val("10", $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("10 >1 failed(Object type not supported)", $v->getErrors()[0]);

        // double
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        assertFalse($v->val(0.8, $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("0.8 >1 failed", $v->getErrors()[0]);


        // float
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        // integer
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));

        // long
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));
    }


    public function testNumberGTE()
    {
        $v = new RebbVal();
        $condition = ">=10";

        // string
        assertFalse($v->val("10", $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("10 >=10 failed(Object type not supported)", $v->getErrors()[0]);

        // double
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        assertFalse($v->val(8.8, $condition));
        assertEquals(1, count($v->getErrors()));
        assertEquals("8.8 >=10 failed", $v->getErrors()[0]);


        // float
        assertTrue($v->val(10.0, $condition));
        assertEquals(0, count($v->getErrors()));

        // integer
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));

        // long
        assertTrue($v->val(10, $condition));
        assertEquals(0, count($v->getErrors()));
    }
}