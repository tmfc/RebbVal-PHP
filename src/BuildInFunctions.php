<?php

namespace Rebb\Val;

use DateTimeImmutable;

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
        if (is_bool($obj)) {
            return $obj == true;
        } else if (is_string($obj)) {
            return in_array($obj, $this->config[RebbValConfig::TRUE_STRING]);
        } else if (is_numeric($obj)) {
            return $obj == 1;
        } else {
            $this->error = 'ObjectTypeNotSupport';
            return false;
        }
    }

    public function checkFalse($obj): bool
    {
        if (is_bool($obj)) {
            return $obj != true;
        } else if (is_string($obj)) {
            return !in_array($obj, $this->config[RebbValConfig::TRUE_STRING]);
        } else if (is_numeric($obj)) {
            return $obj == 0;
        } else {
            $this->error = 'ObjectTypeNotSupport';
            return false;
        }
    }

    public function checkIMEI($obj): bool
    {
        $regex = '/^(\d{15})$|^(\d{2}\-\d{6}\-\d{6}\-\d)$/';
        $result = $this->checkRegex($obj, $regex);
        if ($result) {
            $imei = str_replace("-", "", $obj);

            $check = substr($imei, 14);
            $imei = substr($imei, 0, 14);
            $checksum = 0;

            for ($i = 0; $i < strlen($imei); $i++) {
                $weight = 1;
                if ($i % 2 == 1)
                    $weight = 2;

                $char_int = intval($imei[$i]) * $weight;
                if ($char_int >= 10)
                    $char_int = $char_int - 9;

                $checksum += $char_int;
            }
            $checksum %= 10;
            $checksum = $checksum == 0 ? 0 : 10 - $checksum;

            return $checksum == $check;
        }
        return false;
    }

    public function checkIMEISV($obj)
    {
        $regex = "/^(\d{16})$|^(\d{2}\-\d{6}\-\d{6}\-\d{2})$/";
        return $this->checkRegex($obj, $regex);
    }

    public function checkISBN($obj)
    {
        $regex = "/^(\\d{13})$|^(978\\-\\d\\-\\d{3}\\-\\d{5}\\-\\d)$/";
        $result = $this->checkRegex($obj, $regex);
        if ($result) {
            $isbn = str_replace("-", "", $obj);

            $checksum = 0;
            for ($i = 0; $i < strlen($isbn); $i++) {
                $weight = 1;
                if ($i % 2 == 1)
                    $weight = 3;
                $char_int = intval($isbn[$i]);
                $a = $char_int * $weight;
                $checksum += $a;
            }

            return $checksum % 10 == 0;
        }
        return false;
    }

    public function checkUUID($obj)
    {
        $regex = "/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$/";
        return $this->checkRegex($obj, $regex);
    }

    public function checkID($obj)
    {
        $regex = "/(^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$)/";
        $regexResult = $this->checkRegex($obj, $regex);
        if (!$regexResult)
            return false;

        $id = $obj;

        //check area code
        $areas = [11, 12, 13, 14, 15, 21, 22, 23, 31, 32, 33, 34, 35, 36, 37, 41, 42, 43, 44, 45, 46, 50, 51, 52, 53, 54, 61, 62, 63, 64, 65, 71, 81, 82, 91];
        $area = intval(substr($id, 0, 2));
        if (!in_array($area, $areas))
            return false;

        //check birthday
        $birthday = substr($id, 6, 8);
        try {
            $date = new DateTimeImmutable($birthday);
            if ($date->format('Ymd') !== $birthday)
                return false;
        } catch (\Exception $ex) {
            $this->error = $ex->getMessage();
            return false;
        }

        //checksum
        $checksum = 0;
        $weight = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
        for ($i = 0; $i < 17; $i++) {
            $char_int = intval($id[$i]);
            $a = $char_int * $weight[$i];
            $checksum += $a;
        }
        $checksumCharList = ["1", "0", "X", "9", "8", "7", "6", "5", "4", "3", "2"];
        $checksumChar = $checksumCharList[$checksum % 11];
        return $checksumChar == substr($id, -1);
    }

    public function checkMac($obj)
    {
        $regex = "/^((?:[a-fA-F0-9]{2}[:-]){5}[a-fA-F0-9]{2})$/";
        return $this->checkRegex($obj, $regex);
    }

    private function checkRegex($obj, $regex)
    {
        if (is_string($obj)) {
            return preg_match_all($regex, $obj, $matches, PREG_SET_ORDER, 0);
        } else {
            $this->error = "ObjectTypeNotSupport";
            return false;
        }
    }
}