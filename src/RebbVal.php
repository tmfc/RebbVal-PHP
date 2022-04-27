<?php

namespace Rebb\Val;


use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;
use DateTimeImmutable;

class RebbVal
{

    private $engine;
    private $has_error;
    private $errors;

    static private $global_config;

    static public function addGlobalConfig($key, $value)
    {
        self::$global_config[$key] = $value;
    }

//    private $condition;
//    private $object;

    /**
     * RebbVal constructor.
     */
    public function __construct()
    {
        $this->engine = new EvalVisitor("", self::$global_config);
        $this->has_error = false;
        $this->errors = [];
    }

    public function date($str): ?DateTimeImmutable
    {
        try {
            return new DateTimeImmutable($str);
        }
        catch(\Exception $e)
        {
            $this->has_error = true;
            $this->errors[] = $e->getMessage();
            return null;
        }
    }

    public function year($str): ?DateTimeImmutable
    {
        try {
            return new DateTimeImmutable($str . "-01-01");
        }
        catch(\Exception $e)
        {
            $this->has_error = true;
            $this->errors[] = $e->getMessage();
            return null;
        }
    }

    public function registerCustomValidator($name, $func)
    {
        $this->engine->registerCustomValidator($name, $func);
    }

    public function addConfig($key, $value)
    {
        $this->engine->addConfig($key, $value);
    }

    public function setTimezone($timezone) { $this->engine->setTimezone($timezone); }

    public function getTimezone()
    {
        return $this->engine->getTimezone();
    }

    public function val($object, string $condition): bool
    {
        $this->errors = [];
//        $this->condition = $condition;
//        $this->object = $object;
        $input = InputStream::fromString($condition);
        $lexer = new RebbValLexer($input);
        $tokens = new CommonTokenStream($lexer);
        $parser = new RebbValParser($tokens);
        $tree = $parser->unaryTests();

        $this->engine->setObject($object);
        $this->engine->visit($tree);

        if(!$this->engine->isValid())
        {
            $this->has_error = true;
            if($object == null)
                $error_message = "object is null";
            else
            {
                if(is_a($object, DateTimeImmutable::class))
                    $error_message = $object->format('Y-m-d H:i:s') . " " . $condition . " failed";
                else if(is_array($object))
                {
                    if(count($object) > 5)
                    {
                        $sliced_array = array_slice($object, 0, 5, true);
                        $error_message = '[' . implode(', ', $sliced_array). ',...]' . " " . $condition . " failed";
                    }
                    else
                        $error_message = '[' . implode(', ', $object). ']' . " " . $condition . " failed" ;//$object . " " . $condition . " failed";
                }
                else
                    $error_message = $object . " " . $condition . " failed" ;//$object . " " . $condition . " failed";

            }
            if($this->engine->getError() != null && $this->engine->getError() != "")
                $error_message .= "(" . $this->engine->getError() . ")";
            $this->errors[] = $error_message;
            return false;
        }

        return true;
    }

    public function hasError(): bool
    {
        return $this->has_error;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

}