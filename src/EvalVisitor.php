<?php


namespace Rebb\Val;

use DateTimeInterface;
use DateTimeZone;

class EvalVisitor extends RebbValBaseVisitor
{

    private $timezone;
    private $obj;
    private $valid;
    private $error;

    private $values;

    private $customFunctions = [];

    private $config;
    /**
     * EvalVisitor constructor.
     * @param  $obj
     */
    public function __construct($obj, $global_config)
    {
        $this->setTimezone(new DateTimeZone('Asia/Shanghai'));
        $this->setObject($obj);
        $this->initConfig($global_config);
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

    private function setValue($node, $value) { $this->values[$node->toString()] = $value; }

    private function getValue($node) {return $this->values[$node->toString()]; }

    public function registerCustomValidator($name, $class)
    {
        $this->customFunctions[$name] = $class;
    }

    private function initConfig($global_config = null)
    {
        if(!empty($global_config) && is_array($global_config))
            $this->config = $global_config;
        else
            $this->config = [];
        if(!array_key_exists(RebbValConfig::TRUE_STRING, $this->config))
            $this->config[RebbValConfig::TRUE_STRING] = ['true','on', '1', 'yes','ok'];
    }

    public function addConfig($key, $value)
    {
        $this->config[$key] = $value;
    }


    //Unary Test and Combination begin

    public function visitConjunction(Context\ConjunctionContext $context) {
        $unaryCtx0 = $context->unaryTests();
        $unaryCtx1 = $context->unaryTest();
        $this->visit($unaryCtx0);
        $this->visit($unaryCtx1);
        if(is_bool($this->getValue($unaryCtx0)) && is_bool($this->getValue($unaryCtx1)))
        {
            $value0 = $this->getValue($unaryCtx0);
            $value1 = $this->getValue($unaryCtx1);
            $this->setValue($context, $value0 && $value1);
            $this->valid = $value0 && $value1;
        }
        else
        {
            $this->setValue($context, false);
            $this->valid = false;
            $this->error = "ExpressionValueTypeNotMatch";
        }
    }

    public function visitDisjunction(Context\DisjunctionContext $context) {
        $unaryCtx0 = $context->unaryTests();
        $unaryCtx1 = $context->unaryTest();
        $this->visit($unaryCtx0);
        $this->visit($unaryCtx1);
        if(is_bool($this->getValue($unaryCtx0)) && is_bool($this->getValue($unaryCtx1)))
        {
            $value0 = $this->getValue($unaryCtx0);
            $value1 = $this->getValue($unaryCtx1);
            $this->setValue($context, $value0 || $value1);
            $this->valid = $value0 || $value1;
        }
        else
        {
            $this->setValue($context, false);
            $this->valid = false;
            $this->error = "ExpressionValueTypeNotMatch";
        }
    }

    public function visitSingleTest(Context\SingleTestContext $context) {
        $unaryCtx = $context->unaryTest();
        $this->visit($unaryCtx);

        if(is_bool($this->getValue($unaryCtx)))
        {
            $value = $this->getValue($unaryCtx);
            $this->setValue($context, $value);
            $this->valid = $value;
        }
        else
        {
            $this->setValue($context, false);
            $this->valid = false;
            $this->error = "ExpressionValueTypeNotMatch";
        }
    }

    public function visitNormalUnaryTest(Context\NormalUnaryTestContext $context) {
        $this->visit($context->positiveUnaryTest());
        $this->setValue($context, $this->getValue($context->positiveUnaryTest()));
    }

    public function visitNegationUnaryTest(Context\NegationUnaryTestContext $context)
    {
        $unaryTestCtx = $context->positiveUnaryTest();
        $this->visit($unaryTestCtx);
        if (is_bool($this->getValue($unaryTestCtx))) {
            $value = $this->getValue($unaryTestCtx);
            $this->setValue($context, !$value);
        } else {
            $this->setValue($context, false);
            $this->error = "ExpressionValueTypeNotMatch";
        }
    }

    public function visitIgnoreUnaryTest(Context\IgnoreUnaryTestContext $context) {
        $this->setValue($context, true);
    }

    public function visitPositiveUnaryTest(Context\PositiveUnaryTestContext $context) {
        $this->visit($context->expression());
        $this->setValue($context, $this->getValue($context->expression()));
    }
    //Unary Test and Combination end

    //Basic element start
    /** String */
    public function visitString(Context\StringContext $context)
    {
        $str = $context->getText();
        if($str != null)
            $this->setValue($context, substr($str, 1, strlen($str) -1));
    }

    /** Number */
    public function visitNumber(Context\NumberContext $context) {
        try {
            $this->setValue($context, $context->getText());
        } catch(\Exception $ex)
            {
                $this->setValue($context, null);
                $this->error = $ex->getMessage();
            }
    }

    /** Date */
    public function visitDate(Context\DateContext $context) {
        try {
            $date = $this->date($context->getText());
            $this->setValue($context, $date);
        } catch (\Exception $ex) {
            $this->setValue($context, null);
            $this->error = $ex->getMessage();
        }
    }

    /** Array */
    public function visitArray(Context\ArrayContext $context) {
        try {
            $arr =[];
            foreach($context->arrayLiteral()->NumbericLiteral() as $tree)
            {
                $element = $tree->getText();
                $arr[] = $element;
            }
            $this->setValue($context, $arr);
        } catch(\Exception $ex)
        {
            $this->setValue($context, null);
            $this->error = $ex->getMessage();
        }
    }
    //Basic element end


    //Compare start
    /** Age Compare*/
    public function visitAgeCompare(Context\AgeCompareContext $context) {
        $result = false;
        $this->visit($context->expression());
        if ($this->obj instanceof DateTimeInterface)
        {

            $now = new \DateTimeImmutable('now');
            $diff = $now->diff($this->obj);

            $expr = floatval($this->getValue($context->expression()));

            switch( $context->op->getType()) {
                case RebbValParser::OLDER:
                    $result = $diff->y >= $expr;
                    break;
                case RebbValParser::YOUNGER:
                    $result = $diff->y < $expr;
                    break;
            }
            if($result){
                $this->setValue($context, true);
            }
            else {
                $this->setValue($context, false);
            }
        }
        else
        {
            $this->valid = false;
            $this->error = "UnsupportedObjectType";
        }
    }
    //Compare start

    // Contain/In start
    public function visitIn(Context\InContext $ctx) {
        $this->visit($ctx->expression());
        $exprValue = $this->getValue($ctx->expression());
        if(is_string($this->obj) && is_string($exprValue))
        {
            $this->setValue($ctx, strpos($this->obj, $exprValue) !== false);
        }
        else if(is_numeric($this->obj) && is_array($exprValue))
        {
            $this->setValue($ctx, in_array($this->obj, $exprValue));
        }
        else
        {
            $this->setValue($ctx, false);
            $this->error = "UnsupportedObjectType";
        }
    }
    // Contain/In end

    public function visitIs(Context\IsContext $context) {
        $b = new BuildInFunctions($this->config);
        $result = $b->check($context->type->getType(), $this->obj);

        $this->setValue($context, $result);
    }

}