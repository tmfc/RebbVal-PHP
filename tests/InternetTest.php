<?php

use Rebb\Val\RebbVal;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class InternetTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testDomain()
    {
        $v = new RebbVal();
        assertTrue($v->val("google.com", "is domain"));
        assertTrue($v->val("www.baidu.com", "is domain"));
        assertFalse($v->val("", "is domain"));
    }

    public function testEmail()
    {
        $v = new RebbVal();
        assertTrue($v->val("abc@gmail.com", "is email"));
        assertTrue($v->val("13800138000@139.com", "is email"));
        assertFalse($v->val("fdsads", "is email"));
    }

    public function testIpv4()
    {
        $v = new RebbVal();
        assertTrue($v->val("8.8.8.8", "is ipv4"));
        assertTrue($v->val("192.168.1.1", "is ipv4"));
        assertFalse($v->val("266.1.3.4", "is ipv4"));
    }


    public function testIpv6()
    {
        $v = new RebbVal();
        assertTrue($v->val("::", "is ipv6"));
        assertTrue($v->val("::123", "is ipv6"));
        assertTrue($v->val("::123:456", "is ipv6"));
        assertTrue($v->val("::123:456:789", "is ipv6"));
        assertTrue($v->val("::123:456:789:abc:def:6666", "is ipv6"));
        assertFalse($v->val("::123:456:789:abc:def:6666:7", "is ipv6"));

        assertTrue($v->val("123::456", "is ipv6"));
        assertTrue($v->val("123::456:789:abc", "is ipv6"));
        assertTrue($v->val("123::456:789:abc:def:6", "is ipv6"));
        assertFalse($v->val("123::456:789:abc:def:6:7", "is ipv6"));

        assertTrue($v->val("123:456::789", "is ipv6"));
        assertTrue($v->val("123:456::789:abc:def", "is ipv6"));
        assertTrue($v->val("123:456::789:abc:def:6666", "is ipv6"));
        assertFalse($v->val("123:456::789:abc:def:6666:7", "is ipv6"));

        assertTrue($v->val("123:456:789::abc", "is ipv6"));
        assertTrue($v->val("123:456:789::abc:def", "is ipv6"));
        assertTrue($v->val("123:456:789::abc:def:6666", "is ipv6"));
        assertFalse($v->val("123:456:789::abc:def:6666:7", "is ipv6"));

        assertTrue($v->val("123:456:789:abc::def", "is ipv6"));
        assertTrue($v->val("123:456:789:abc::def:6666", "is ipv6"));
        assertFalse($v->val("123:456:789:abc::def:6666:7", "is ipv6"));

        assertTrue($v->val("123:456:789:abc:def::6666", "is ipv6"));
        assertFalse($v->val("123:456:789:abc:def::6666:7", "is ipv6"));

        assertTrue($v->val("123:456:789:abc:def:6666::", "is ipv6"));
        assertTrue($v->val("123:456:789:abc:def::", "is ipv6"));
        assertTrue($v->val("123:456:789:abc::", "is ipv6"));
        assertTrue($v->val("123:456:789::", "is ipv6"));
        assertTrue($v->val("123:456::", "is ipv6"));
        assertTrue($v->val("123::", "is ipv6"));

        assertTrue($v->val("123::456:789:abc:def:6666", "is ipv6"));
        assertFalse($v->val("123:456:789:abc:def:6666:7", "is ipv6"));
        assertFalse($v->val("123::456::abc", "is ipv6"));

        assertTrue($v->val("2001:0db8:85a3:08d3:1319:8a2e:0370:7334", "is ipv6"));
    }


    public function testPrivateIp()
    {
        $v = new RebbVal();
        assertTrue($v->val("127.0.0.1", "is private_ip"));
        assertTrue($v->val("10.1.1.1", "is private_ip"));
        assertTrue($v->val("172.18.100.1", "is private_ip"));
        assertTrue($v->val("192.168.2.100", "is private_ip"));
        assertFalse($v->val("8.8.8.8", "is private_ip"));
        assertTrue($v->val("FEC0:0001::", "is private_ip"));
        assertFalse($v->val("123:456:789:abc:def:6666::", "is private_ip"));
    }


    public function testUrl()
    {
        $v = new RebbVal();
        assertTrue($v->val("https://www.google.com", "is url"));
        assertTrue($v->val("http://www.example.com/to/path?param1=foo&param2=bar", "is url"));
        assertFalse($v->val("somebody@somedomain.com", "is url"));
    }
}