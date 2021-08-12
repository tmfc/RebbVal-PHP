<?php

use Rebb\Val\RebbVal;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class BooleanTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testBooleanTrue() {
        $v = new RebbVal();
        assertTrue($v->val(true,"is true"));
        assertFalse($v->val(false,"is true"));
    }

    public function testNumberTrue() {
        $v = new RebbVal();
        assertTrue($v->val(1,"is true"));
        assertFalse($v->val(0,"is true"));

    }

    public function testBooleanFalse()
    {
        $v = new RebbVal();
        assertTrue($v->val(false,"is false"));
        assertFalse($v->val(true,"is false"));
    }

    public function testNumberFalse()
    {
        $v = new RebbVal();
        assertTrue($v->val(0,"is false"));
        assertFalse($v->val(1,"is false"));
    }
}