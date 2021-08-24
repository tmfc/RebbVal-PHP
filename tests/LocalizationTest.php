<?php

use Rebb\Val\RebbVal;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class LocalizationTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGBCode()
    {
        $v = new RebbVal();
        assertTrue($v->val("110101", "is gbcode"));
        assertFalse($v->val("100100", "is gbcode"));
        assertFalse($v->val("13113113111", "is gbcode"));
    }
}