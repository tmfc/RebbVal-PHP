<?php


namespace Rebb\Val;


use DateTimeZone;

class EvalVisitor extends RebbValBaseVisitor
{

    private $timezone;
    private $obj;
    private $valid;
    private $error;

    private $values;

    private $customFunctions = [];
    /**
     * EvalVisitor constructor.
     * @param  $obj
     */
    public function __construct($obj)
    {
        $this->setTimezone(new DateTimeZone('Asia/Shanghai'));
        $this->setObject($obj);
    }

    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    public function getTimezone()
    {
        return $this->timezone;
    }

    public function setObject($obj)
    {
        $this->valid = true;
        $this->error = "";

        $this->obj = $obj;
    }

    public function isValid() {
        return $this->valid;
    }

    public function getError() {
        return $this->error;
    }

    private function setValue($node, $value) { $this->values[$node] = $value; }

    private function getValue($node) {return $this->values[$node]; }

    public function registerCustomValidator($name, $class)
    {
        $this->customFunctions[$name] = $class;
    }
}