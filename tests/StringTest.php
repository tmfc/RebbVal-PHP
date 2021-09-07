<?php

use Rebb\Val\RebbVal;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;
use function PHPUnit\Framework\assertEquals;

class StringTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testStringEqual()
    {
        $v = new RebbVal();
        assertTrue($v->val("a string", "='a string'"));
        assertFalse($v->val("not a string", "='a string'"));
    }


    public function testStringCompare()
    {
        $v = new RebbVal();
        assertFalse($v->val("a string", ">'a string'"));
        assertEquals("a string >'a string' failed(Unsupported Operation)", $v->getErrors()[0]);
        assertFalse($v->val("not a string", "<'a string'"));
        assertEquals("not a string <'a string' failed(Unsupported Operation)", $v->getErrors()[0]);
    }


    public function testStringPosition()
    {
        $v = new RebbVal();
        assertTrue($v->val("This string", "starts with 'This'"));
        assertTrue($v->val("This string", "ends with 'string'"));
    }

    public function testStringIn()
    {
        $v = new RebbVal();
        assertTrue($v->val("string", "in 'a longer string'"));
    }


    public function testStringContains()
    {
        $v = new RebbVal();
        assertTrue($v->val("a longer string", "contains 'string'"));
    }

    public function testStringNotEmpty()
    {
        $v = new RebbVal();
        assertTrue($v->val("a string", "not empty"));
        assertFalse($v->val("", "not empty"));
    }

    public function testStringMaxLength()
    {
        $v = new RebbVal();
        assertTrue($v->val("a string", "max length 15"));
        assertFalse($v->val("a very looooooooooooooong string", "max length 15"));
    }


    public function testStringPercentage()
    {
        $v = new RebbVal();
        assertTrue($v->val("100%", "is percentage"));
        assertTrue($v->val("99.9%", "is percentage"));
        assertFalse($v->val("1000%", "is percentage"));
        assertTrue($v->val("-10.01%", "is percentage"));
    }


    public function testStringBase64()
    {
        $v = new RebbVal();
        assertTrue($v->val("YW55IGNhcm5hbCBwbGVhcw==", "is base64"));
        assertTrue($v->val("YW55IGNhcm5hbCBwbGVhc3U=", "is base64"));
        assertTrue($v->val("YW55IGNhcm5hbCBwbGVhc3Vy", "is base64"));
        assertFalse($v->val("YW5@IGNhcm5hbCBwbGVhcw==", "is base64"));
        assertFalse($v->val("YW55IGNhc=5hbCBwbGVhcw==", "is base64"));
        assertFalse($v->val("YW55IGNhcm5hbCBwbGVhc3V", "is base64"));
        assertFalse($v->val("YW55IGNhcm5hbCBwbGVh=", "is base64"));
        assertFalse($v->val("YW55IGNhcm5hbCBwbGVhc===", "is base64"));
    }


    public function testStringNumber()
    {
        $v = new RebbVal();
        assertTrue($v->val("100", "is number"));
        assertTrue($v->val("100.12", "is number"));
        assertTrue($v->val("-100", "is number"));
        assertTrue($v->val("123.", "is number"));
        assertTrue($v->val("-110.123", "is number"));
        assertTrue($v->val("3.1415926", "is number"));
        assertTrue($v->val("3e30", "is number"));
        assertTrue($v->val("-1.2e12", "is number"));
        assertTrue($v->val("1.0E-12", "is number"));
        assertTrue($v->val(".01", "is number"));
        assertFalse($v->val(".0.1", "is number"));
        assertFalse($v->val("123abc", "is number"));
    }


    public function testStringInt()
    {
        $v = new RebbVal();
        assertTrue($v->val("100", "is int"));
        assertFalse($v->val("100.12", "is int"));
        assertTrue($v->val("-100", "is int"));
        assertFalse($v->val("-110.123", "is int"));
        assertFalse($v->val("3.1415926", "is int"));
        assertFalse($v->val("3e30", "is int"));
        assertFalse($v->val(".0.1", "is int"));
        assertFalse($v->val("123abc", "is int"));
    }


    public function testStringFloat()
    {
        $v = new RebbVal();
        assertFalse($v->val("100", "is float"));
        assertTrue($v->val("100.12", "is float"));
        assertTrue($v->val("111.", "is float"));
        assertFalse($v->val("-100", "is float"));
        assertTrue($v->val("-110.123", "is float"));
        assertTrue($v->val("3.1415926", "is float"));
        assertFalse($v->val("3e30", "is float"));
        assertFalse($v->val(".0.1", "is float"));
        assertFalse($v->val("123abc", "is float"));
    }


    public function testHexColor()
    {
        $v = new RebbVal();
        assertTrue($v->val("#aaa", "is hex color"));
        assertTrue($v->val("#aaab", "is hex color"));
        assertTrue($v->val("#000000", "is hex color"));
        assertTrue($v->val("#ffffffff", "is hex color"));
        assertFalse($v->val("fff", "is hex color"));
        assertFalse($v->val("ffff", "is hex color"));
        assertFalse($v->val("bcdefg", "is hex color"));
    }


    public function testHexNumber()
    {
        $v = new RebbVal();
        assertTrue($v->val("0xaaa", "is hex number"));
        assertTrue($v->val("0Xaaab", "is hex number"));
        assertTrue($v->val("0X000000", "is hex number"));
        assertTrue($v->val("0xffffffff", "is hex number"));
        assertTrue($v->val("fff", "is hex number"));
        assertTrue($v->val("ffff", "is hex number"));
        assertFalse($v->val("bcdefg", "is hex number"));
    }


    public function testPhone()
    {
        $v = new RebbVal();
        assertTrue($v->val("021-59595959", "is phone"));
        assertTrue($v->val("0577-1234567", "is phone"));
        assertFalse($v->val("01234-123123123", "is phone"));
        assertFalse($v->val("58910293", "is phone"));
    }


    public function testMobile()
    {
        $v = new RebbVal();
        assertTrue($v->val("13800138000", "is mobile"));
        assertTrue($v->val("13113113111", "is mobile"));
        assertFalse($v->val("12132132123", "is mobile"));
        assertFalse($v->val("021-59595959", "is mobile"));
    }


    public function testMatch()
    {
        $v = new RebbVal();
        assertTrue($v->val("123", "match /^\\d+$/"));
        assertFalse($v->val("abc123", "match /^\\d+$/"));
    }
}