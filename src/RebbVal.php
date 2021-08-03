<?php

namespace Rebb\Val;


class RebbVal
{

    private $engine;
    private $has_error;
    private $errors;

    /**
     * RebbVal constructor.
     */
    public function __construct()
    {
        $this->engine = new EvalVisitor("");
        $this->has_error = false;
        $this->errors = [];
    }


    public function year($str)
    {
        return date($str . "-01-01");
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

    public function val($object, string $condition)
    {
        $this->errors = [];
//        this.condition = condition;
//        this.object = object;

//        CharStream input = CharStreams.fromString(condition);
//        RebbValLexer lexer = new RebbValLexer(input);
//        CommonTokenStream tokens = new CommonTokenStream(lexer);
//        RebbValParser parser = new RebbValParser(tokens);
//        ParseTree tree = parser.unaryTests(); // parse
//
//        engine.setObject(object);
//
//        engine.visit(tree);
//        if(!engine.isValid())
//        {
//            this.has_error = true;
//            String error_message;
//            if(object == null)
//                error_message = "object is null";
//            else
//                error_message = object.toString() + " " + condition + " failed";
//            if(engine.getError() != null && !engine.getError().equals(""))
//                error_message += "(" + engine.getError() + ")";
//            this.errors.add(error_message);
//            return false;
//        }

        return true;
    }

    public function hasError() {
        return $this->has_error;
    }

    public function getErrors() {
        return $this->errors;
    }

}