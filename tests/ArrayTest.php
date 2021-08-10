<?php

use Rebb\Val\RebbVal;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class ArrayTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testNumberInArray()
    {
        $v = new RebbVal();
        assertTrue($v->val(1, "in [1, 2, 3]"));
        assertFalse($v->val(8, "in [1, 2, 3]"));
        assertTrue($v->val(8, "not in [1, 2, 3]"));
    }
}