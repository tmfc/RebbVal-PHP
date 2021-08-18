<?php

namespace Rebb\Val;

class BuildInFunctions
{
    public $error;
    public $result;

    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    static public function getFunctionMap(): array
    {
        return
            [
                RebbValParser::TRUE => "checkTrue",
                RebbValParser::FALSE => "checkFALSE",
                RebbValParser::LEAPYEAR => "checkLeapYear",
                RebbValParser::LEAPDAY => "checkLeapDay",
                RebbValParser::DOMAIN => "checkDomain",
                RebbValParser::EMAIL => "checkEmail",
                RebbValParser::IPV4 => "checkIpv4",
                RebbValParser::IPV6 => "checkIpv6",
                RebbValParser::PRIVATEIP => "checkPrivateIp",
                RebbValParser::URL => "checkUrl",
                RebbValParser::MAC => "checkMac",
                RebbValParser::IMEI => "checkIMEI",
                RebbValParser::IMEISV => "checkIMEISV",
                RebbValParser::ISBN => "checkISBN",
                RebbValParser::PERCENTAGE => "checkPercentage",
                RebbValParser::BASE64 => "checkBase64",
                RebbValParser::NUMBER => "checkNumber",
                RebbValParser::INT => "checkInt",
                RebbValParser::FLOAT => "checkFloat",
                RebbValParser::PHONE => "checkPhone",
                RebbValParser::MOBILE => "checkMobile",
                RebbValParser::UUID => "checkUUID",
                RebbValParser::GBCODE => "checkGBCode",
                RebbValParser::ID => "checkID",
            ];
    }

    static public function getHexFunctionMap(): array
    {
        return [
            RebbValParser::COLOR => "checkHexColor",
            RebbValParser::NUMBER => "checkHexNumber",
        ];
    }

    public function check($type, $obj): bool
    {
        return $this->doCheck($type, $obj, self::getFunctionMap());
    }

    public function checkHex($type, $obj): bool
    {
        return $this->doCheck($type, $obj, self::getHexFunctionMap());
    }

    private function doCheck($type, $obj, $functionMap): bool
    {
        if (key_exists($type, $functionMap)) {
            $func = $functionMap[$type];
            $this->result = $this->$func($obj);
        } else {
            $this->result = false;
        }
        return $this->result;
    }

    public function checkTrue($obj): bool
    {
        if(is_bool($obj))
        {
            return $obj == true;
        }
        else if(is_string($obj))
        {
            return in_array($obj, $this->config[RebbValConfig::TRUE_STRING]);
        }
        else if(is_numeric($obj))
        {
            return $obj == 1;
        }

        else
        {
            $this->error = 'ObjectTypeNotSupport';
            return false;
        }
    }

    public function checkFalse($obj): bool
    {
        if(is_bool($obj))
        {
            return $obj != true;
        }
        else if(is_string($obj))
        {
            return !in_array($obj, $this->config[RebbValConfig::TRUE_STRING]);
        }
        else if(is_numeric($obj))
        {
            return $obj == 0;
        }
        else
        {
            $this->error = 'ObjectTypeNotSupport';
            return false;
        }
    }

    public function checkLeapYear($obj): bool
    {
        if(is_a($obj, \DateTimeImmutable::class)){
            return date("L", $obj->getTimestamp());
        }
        else
        {
            $this->error = "ObjectTypeNotDate";
            return false;
        }
    }
    public function checkLeapDay($obj): bool
    {
        if(is_a($obj, \DateTimeImmutable::class)){
            return date("L", $obj->getTimestamp()) && $obj->format('m-d') == "02-29";
        }
        else
        {
            $this->error = "ObjectTypeNotDate";
            return false;
        }
    }
}