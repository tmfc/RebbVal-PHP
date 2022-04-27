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

    public function testArrayIsUnique()
    {
        $v = new RebbVal();
        assertTrue($v->val([1, 2, 3], "is unique"));
        assertFalse($v->val([1, 2, 2], "is unique"));
    }
    public function testArrayIsUniqueTypeNotSupport()
    {
        $v = new RebbVal();
        assertFalse($v->val(8, "is unique"));
        self::assertCount(1, $v->getErrors());
        self::assertEquals("8 is unique failed(ObjectTypeNotSupported)", $v->getErrors()[0]);
    }
}