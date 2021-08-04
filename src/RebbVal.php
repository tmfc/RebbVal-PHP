<?php

namespace Rebb\Val;


use Antlr\Antlr4\Runtime\CharStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;
use DateTimeImmutable;

class RebbVal
{

    private $engine;
    private $has_error;
    private $errors;

//    private $condition;
//    private $object;

    /**
     * RebbVal constructor.
     */
    public function __construct()
    {
        $this->engine = new EvalVisitor("");
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

    public function registerCustomValidator($name, $class)
    {
        $this->engine->registerCustomValidator($name, $class);
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
                $error_message = $condition . " failed" ;//$object . " " . $condition . " failed";
            if($this->engine->getError() != null && $this->engine->getError()!="")
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