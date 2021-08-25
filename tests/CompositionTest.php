<?php

use Rebb\Val\RebbVal;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class CompositionTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testUnaryTests()
    {
        $v = new RebbVal();
        assertTrue($v->val(10000, ">10 and <1000 or =10000"));
        assertTrue($v->val(1000, ">10 and <100000 and !=10000"));
        assertFalse($v->val(1000, ">10 and <100 or =10000"));
        assertTrue($v->val(1000, ">100 or <10 or =10000"));
    }


    public function testConjunction()
    {
        $v = new RebbVal();
        assertTrue($v->val(100, ">10 and <1000"));
        assertFalse($v->val(100, ">10 and <100"));
    }


    public function testDisjunction()
    {
        $v = new RebbVal();
        assertTrue($v->val(70, ">60 or <10"));
        assertTrue($v->val(5, ">60 or <10"));
        assertFalse($v->val(30, ">60 or <10"));
    }


    public function testNot()
    {
        $v = new RebbVal();
        assertFalse($v->val(100, "<10"));
        assertTrue($v->val(100, "not (<10)"));
        assertTrue($v->val(100, "not <10"));
    }


    public function testCustomFunction()
    {

        $v = new RebbVal();
        $v->registerCustomValidator("Demo", function($obj) {
            if($obj == "Demo")
                return true;
            else
                return false;
        });
        assertTrue($v->val("Demo", "is Demo"));
        assertFalse($v->val("Not Demo", "is Demo"));
    }
}