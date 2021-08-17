<?php

use Rebb\Val\RebbVal;
use Rebb\Val\RebbValConfig;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class BooleanTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
        RebbVal::addGlobalConfig(RebbvalConfig::TRUE_STRING, ['true','on', '1', 'yes','ok']);
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

    public function testStringTrue() {
        $v = new RebbVal();
        assertTrue($v->val("1","is true"));
        assertTrue($v->val("on","is true"));
        assertTrue($v->val("true","is true"));
        assertTrue($v->val("yes","is true"));
        assertFalse($v->val("0","is true"));
    }

    public function testStringTrueConfigured() {
        $v = new RebbVal();
        $v->addConfig(RebbvalConfig::TRUE_STRING, ['true']);
        assertFalse($v->val("1","is true"));
        assertFalse($v->val("on","is true"));
        assertTrue($v->val("true","is true"));
        assertFalse($v->val("yes","is true"));
        assertFalse($v->val("0","is true"));
    }

    public function testStringTrueGlobalConfigured() {
        RebbVal::addGlobalConfig(RebbvalConfig::TRUE_STRING, ['yes']);
        $v = new RebbVal();
        assertFalse($v->val("1","is true"));
        assertFalse($v->val("on","is true"));
        assertFalse($v->val("true","is true"));
        assertTrue($v->val("yes","is true"));
        assertFalse($v->val("0","is true"));
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

    public function testStringFalse() {
        $v = new RebbVal();
        assertFalse($v->val("1","is false"));
        assertFalse($v->val("on","is false"));
        assertFalse($v->val("true","is false"));
        assertFalse($v->val("yes","is false"));
        assertTrue($v->val("0","is false"));
    }

    public function testStringFalseConfigured() {
        $v = new RebbVal();
        $v->addConfig(RebbvalConfig::TRUE_STRING, ['true']);
        assertTrue($v->val("1","is false"));
        assertTrue($v->val("on","is false"));
        assertFalse($v->val("true","is false"));
        assertTrue($v->val("yes","is false"));
        assertTrue($v->val("0","is false"));
    }
}