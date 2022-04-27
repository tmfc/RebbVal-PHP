<?php


namespace Rebb\Val;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use phpDocumentor\Reflection\Types\This;

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
        $this->valid = false;
        $this->error = "";

        $this->obj = $obj;
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function getError()
    {
        return $this->error;
    }

    private function setValue($node, $value)
    {
        $this->values[$node->toString()] = $value;
    }

    private function getValue($node)
    {
        return $this->values[$node->toString()];
    }

    public function registerCustomValidator($name, $func)
    {
        $this->customFunctions[$name] = $func;
    }

    private function initConfig($global_config = null)
    {
        if (!empty($global_config) && is_array($global_config))
            $this->config = $global_config;
        else
            $this->config = [];
        if (!array_key_exists(RebbValConfig::TRUE_STRING, $this->config))
            $this->config[RebbValConfig::TRUE_STRING] = ['true', 'on', '1', 'yes', 'ok'];
    }

    public function addConfig($key, $value)
    {
        $this->config[$key] = $value;
    }

    private function is_date($o): bool
    {
        return is_a($o, DateTimeImmutable::class);
    }


    //region Unary Test and Combination
    public function visitConjunction(Context\ConjunctionContext $context)
    {
        $unaryCtx0 = $context->unaryTests();
        $unaryCtx1 = $context->unaryTest();
        $this->visit($unaryCtx0);
        $this->visit($unaryCtx1);
        if (is_bool($this->getValue($unaryCtx0)) && is_bool($this->getValue($unaryCtx1))) {
            $value0 = $this->getValue($unaryCtx0);
            $value1 = $this->getValue($unaryCtx1);
            $this->setValue($context, $value0 && $value1);
            $this->valid = $value0 && $value1;
        } else {
            $this->setValue($context, false);
            $this->valid = false;
            $this->error = "ExpressionValueTypeNotMatch";
        }
    }

    public function visitDisjunction(Context\DisjunctionContext $context)
    {
        $unaryCtx0 = $context->unaryTests();
        $unaryCtx1 = $context->unaryTest();
        $this->visit($unaryCtx0);
        $this->visit($unaryCtx1);
        if (is_bool($this->getValue($unaryCtx0)) && is_bool($this->getValue($unaryCtx1))) {
            $value0 = $this->getValue($unaryCtx0);
            $value1 = $this->getValue($unaryCtx1);
            $this->setValue($context, $value0 || $value1);
            $this->valid = $value0 || $value1;
        } else {
            $this->setValue($context, false);
            $this->valid = false;
            $this->error = "ExpressionValueTypeNotMatch";
        }
    }

    public function visitSingleTest(Context\SingleTestContext $context)
    {
        $unaryCtx = $context->unaryTest();
        $this->visit($unaryCtx);

        if (is_bool($this->getValue($unaryCtx))) {
            $value = $this->getValue($unaryCtx);
            $this->setValue($context, $value);
            $this->valid = $value;
        } else {
            $this->setValue($context, false);
            $this->valid = false;
            $this->error = "ExpressionValueTypeNotMatch";
        }
    }

    public function visitNormalUnaryTest(Context\NormalUnaryTestContext $context)
    {
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

    public function visitIgnoreUnaryTest(Context\IgnoreUnaryTestContext $context)
    {
        $this->setValue($context, true);
    }

    public function visitPositiveUnaryTest(Context\PositiveUnaryTestContext $context)
    {
        $this->visit($context->expression());
        $this->setValue($context, $this->getValue($context->expression()));
    }
    //endregion

    //region Basic element
    /** String */
    public function visitString(Context\StringContext $context)
    {
        $str = $context->getText();
        if ($str != null)
            $this->setValue($context, trim($str, "'"));
    }

    /** Number */
    public function visitNumber(Context\NumberContext $context)
    {
        try {
            $this->setValue($context, $context->getText());
        } catch (\Exception $ex) {
            $this->setValue($context, null);
            $this->error = $ex->getMessage();
        }
    }

    /** Date */
    public function visitDate(Context\DateContext $context)
    {
        try {
            $date = new DateTimeImmutable($context->getText());

            $this->setValue($context, $date);
        } catch (\Exception $ex) {
            $this->setValue($context, null);
            $this->error = $ex->getMessage();
        }
    }

    /** Array */
    public function visitArray(Context\ArrayContext $context)
    {
        try {
            $arr = [];
            foreach ($context->arrayLiteral()->NumbericLiteral() as $tree) {
                $element = $tree->getText();
                $arr[] = $element;
            }
            $this->setValue($context, $arr);
        } catch (\Exception $ex) {
            $this->setValue($context, null);
            $this->error = $ex->getMessage();
        }
    }
    //endregion


    //region Compare
    /** Age Compare*/
    public function visitAgeCompare(Context\AgeCompareContext $context)
    {
        $result = false;
        $this->visit($context->expression());
        if ($this->obj instanceof DateTimeInterface) {

            $now = new \DateTimeImmutable('now');
            $diff = $now->diff($this->obj);

            $expr = floatval($this->getValue($context->expression()));

            switch ($context->op->getType()) {
                case RebbValParser::OLDER:
                    $result = $diff->y >= $expr;
                    break;
                case RebbValParser::YOUNGER:
                    $result = $diff->y < $expr;
                    break;
            }
            if ($result) {
                $this->setValue($context, true);
            } else {
                $this->setValue($context, false);
            }
        } else {
            $this->valid = false;
            $this->error = "UnsupportedObjectType";
        }
    }

    public function visitCompare(Context\CompareContext $context)
    {
        $result = false;
        $this->visit($context->expression());
        $exprValue = $this->getValue($context->expression());
        if (is_string($this->obj) && is_string($exprValue)) {

            if ($context->op->getType() == RebbValParser::EQUAL)
                $result = $this->obj == $exprValue;
            else {
                $result = false;
                $this->error = "Unsupported Operation";
            }
            $this->setValue($context, $result);
        } else if ((is_numeric($this->obj) && is_numeric($exprValue))
            || ($this->is_date($this->obj) && $this->is_date($exprValue))) {
            $result = $this->doCompare($this->obj, $exprValue, $context->op->getType());
            $this->setValue($context, $result);
        } else {
            $this->setValue($context, false);
            $this->error = "UnsupportedObjectType";
        }
        return null;
    }

    private function doCompare($obj, $v, $t): bool
    {
        $result = false;
        if ($this->is_date($obj)) {
            $obj = $obj->getTimestamp();
            $v = $v->getTimestamp();
        }

        switch ($t) {
            case RebbValParser::EQUAL:
                $result = $obj == $v;
                break;
            case RebbValParser::NEQUAL:
                $result = $obj != $v;
                break;
            case RebbValParser::GT:
                $result = $obj > $v;
                break;
            case RebbValParser::GTE:
                $result = $obj >= $v;
                break;
            case RebbValParser::LT:
                $result = $obj < $v;
                break;
            case RebbValParser::LTE:
                $result = $obj <= $v;
                break;
        }
        return $result;
    }

    public function visitBetween(Context\BetweenContext $context)
    {
        $this->visit($context->expression(0));
        $this->visit($context->expression(1));
        $l_value = $this->getValue($context->expression(0));
        $r_value = $this->getValue($context->expression(1));
        if (is_numeric($this->obj) && is_numeric($l_value) && is_numeric($r_value)) {

            if ($this->obj >= $l_value && $this->obj <= $r_value) {
                $this->setValue($context, true);
            } else {
                $this->setValue($context, false);
            }
        } else if ($this->is_date($this->obj)
            && $this->is_date($l_value)
            && $this->is_date($r_value)) {

            $obj = $this->obj->getTimestamp();
            $l = $l_value->getTimestamp();
            $r = $r_value->getTimestamp();

            if ($obj >= $l && $obj <= $r) {
                $this->setValue($context, true);
            } else {
                $this->setValue($context, false);
            }
        } else {
            $this->setValue($context, false);
            $this->error = "ObjectTypeNotSupported";
        }
    }

    public function visitInterval(Context\IntervalContext $context)
    {
        $this->visit($context->expression(0));
        $this->visit($context->expression(1));
        $l_value = $this->getValue($context->expression(0));
        $r_value = $this->getValue($context->expression(1));
        if ((is_numeric($l_value) && is_numeric($r_value) && is_numeric($this->obj))
            || ($this->is_date($this->obj)
                && $this->is_date($l_value)
                && $this->is_date($r_value))) {
            $result = $this->doIntervalCompare($this->obj, $l_value, $r_value, $context->start->getText(), $context->end->getText());
            $this->setValue($context, $result);
        } else {
            $this->setValue($context, false);
            $this->error = "UnsupportedObjectType";
        }
    }

    private function doIntervalCompare($obj, $l, $r, $start, $end): bool
    {
        if ($this->is_date($obj)) {
            $obj = $obj->getTimestamp();
            $l = $l->getTimestamp();
            $r = $r->getTimestamp();
        }

        $startResult = false;
        if ($start == "(" || $start == "]")
            $startResult = $obj > $l;
        if ($start == "[")
            $startResult = $obj >= $l;

        $endResult = false;
        if ($startResult) {
            if ($end == ")" || $end == "[")
                $endResult = $obj < $r;
            if ($end == "]")
                $endResult = $obj <= $r;
        }

        return $startResult && $endResult;
    }
    //endregion

    //region Contain/In/Position
    public function visitContains(Context\ContainsContext $context)
    {
        $this->visit($context->expression());
        $exprValue = $this->getValue($context->expression());
        if (is_string($this->obj) && is_string($exprValue)) {
            if (strpos($this->obj, $exprValue))
                $this->setValue($context, true);
            else
                $this->setValue($context, false);
        } else {
            $this->setValue($context, false);
            $this->error = "ObjectTypeNotSupported";
        }
    }

    public function visitIn(Context\InContext $context)
    {
        $this->visit($context->expression());
        $exprValue = $this->getValue($context->expression());
        if (is_string($this->obj) && is_string($exprValue)) {
            $this->setValue($context, strpos($exprValue, $this->obj) !== false);
        } else if (is_numeric($this->obj) && is_array($exprValue)) {
            $this->setValue($context, in_array($this->obj, $exprValue));
        } else {
            $this->setValue($context, false);
            $this->error = "ObjectTypeNotSupported";
        }
    }

    public function visitStringPosition(Context\StringPositionContext $context)
    {
        $exprContext = $context->expression();
        $this->visit($exprContext);
        $exprValue = $this->getValue($exprContext);
        if (is_string($this->obj) && is_string($exprValue)) {
            $result = false;
            $len = strlen($exprValue);
            if($len > strlen($this->obj))
                $result = false;
            else{
                if ($context->op->getText() == "starts") {
                    $result = substr($this->obj, 0, $len) === $exprValue;
                } else if ($context->op->getText() == "ends") {
                    $result = substr($this->obj, -$len) === $exprValue;
                }
            }
            $this->setValue($context, $result);
        } else {
            $this->setValue($context, false);
            $this->error = "ObjectTypeNotSupported";
        }
    }

    //endregion

    //region String
    public function visitNotEmpty(Context\NotEmptyContext $context)
    {
        if (is_string($this->obj))
            $this->setValue($context, !$this->obj == "");
        else {
            $this->setValue($context, false);
            $this->error = "ObjectTypeNotSupported";
        }
    }

    public function visitMaxLength(Context\MaxLengthContext $context)
    {
        $exprValue = $context->NumbericLiteral()->getText();
        if (is_string($this->obj)) {
            if (mb_strlen($this->obj) <= $exprValue)
                $this->setValue($context, true);
            else
                $this->setValue($context, false);
        } else {
            $this->setValue($context, false);
            $this->error = "ObjectTypeNotSupported";
        }
    }

    #endregion

    public function visitIs(Context\IsContext $context)
    {
        $b = new BuildInFunctions($this->config);
        $result = $b->check($context->type->getType(), $this->obj);

        $this->setValue($context, $result);
    }

    public function visitArrayIsUnique(Context\ArrayIsUniqueContext $context)
    {
        if(!is_array($this->obj))
        {
            $this->setValue($context, false);
            $this->error = "ObjectTypeNotSupported";
        }
        else
        {
            $result = (count(array_unique($this->obj)) == count($this->obj));
            $this->setValue($context, $result);
        }
        return parent::visitArrayIsUnique($context);
    }

    public function visitIsHex(Context\IsHexContext $context)
    {
        $b = new BuildInFunctions($this->config);
        $result = $b->checkHex($context->type->getType(), $this->obj);
        $this->setValue($context, $result);
    }

    public function visitIsCustom(Context\IsCustomContext $context)
    {
        $key = $context->type->getText();
        if (array_key_exists($key, $this->customFunctions)) {
            $f = $this->customFunctions[$key];

            try {


                if ($f($this->obj))
                    $this->setValue($context, true);
                else
                    $this->setValue($context, false);
            } catch (\Exception $ex) {
                $this->setValue($context, false);
                $this->error = $ex->getMessage();
            }
        } else
            $this->setValue($context, false);
    }

    public function visitMatch(Context\MatchContext $context)
    {
        if (is_string($this->obj)) {
            $exprValue = $context->regex->getText();
            $regex = $exprValue;
            $result = preg_match_all($regex, $this->obj, $matches, PREG_SET_ORDER, 0);
            if ($result > 0)
                $this->setValue($context, true);
            else
                $this->setValue($context, false);
        } else {
            $this->setValue($context, false);
            $this->error = "ObjectTypeNotSupported";
        }
    }
}