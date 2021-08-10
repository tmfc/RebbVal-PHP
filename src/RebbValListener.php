<?php

/*
 * Generated from RebbVal.g4 by ANTLR 4.9
 */

namespace Rebb\Val;
use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see RebbValParser}.
 */
interface RebbValListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by the `Disjunction`
	 * labeled alternative in {@see RebbValParser::unaryTests()}.
	 * @param $context The parse tree.
	 */
	public function enterDisjunction(Context\DisjunctionContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Disjunction` labeled alternative
	 * in {@see RebbValParser::unaryTests()}.
	 * @param $context The parse tree.
	 */
	public function exitDisjunction(Context\DisjunctionContext $context) : void;
	/**
	 * Enter a parse tree produced by the `Conjunction`
	 * labeled alternative in {@see RebbValParser::unaryTests()}.
	 * @param $context The parse tree.
	 */
	public function enterConjunction(Context\ConjunctionContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Conjunction` labeled alternative
	 * in {@see RebbValParser::unaryTests()}.
	 * @param $context The parse tree.
	 */
	public function exitConjunction(Context\ConjunctionContext $context) : void;
	/**
	 * Enter a parse tree produced by the `SingleTest`
	 * labeled alternative in {@see RebbValParser::unaryTests()}.
	 * @param $context The parse tree.
	 */
	public function enterSingleTest(Context\SingleTestContext $context) : void;
	/**
	 * Exit a parse tree produced by the `SingleTest` labeled alternative
	 * in {@see RebbValParser::unaryTests()}.
	 * @param $context The parse tree.
	 */
	public function exitSingleTest(Context\SingleTestContext $context) : void;
	/**
	 * Enter a parse tree produced by the `NormalUnaryTest`
	 * labeled alternative in {@see RebbValParser::unaryTest()}.
	 * @param $context The parse tree.
	 */
	public function enterNormalUnaryTest(Context\NormalUnaryTestContext $context) : void;
	/**
	 * Exit a parse tree produced by the `NormalUnaryTest` labeled alternative
	 * in {@see RebbValParser::unaryTest()}.
	 * @param $context The parse tree.
	 */
	public function exitNormalUnaryTest(Context\NormalUnaryTestContext $context) : void;
	/**
	 * Enter a parse tree produced by the `NegationUnaryTest`
	 * labeled alternative in {@see RebbValParser::unaryTest()}.
	 * @param $context The parse tree.
	 */
	public function enterNegationUnaryTest(Context\NegationUnaryTestContext $context) : void;
	/**
	 * Exit a parse tree produced by the `NegationUnaryTest` labeled alternative
	 * in {@see RebbValParser::unaryTest()}.
	 * @param $context The parse tree.
	 */
	public function exitNegationUnaryTest(Context\NegationUnaryTestContext $context) : void;
	/**
	 * Enter a parse tree produced by the `IgnoreUnaryTest`
	 * labeled alternative in {@see RebbValParser::unaryTest()}.
	 * @param $context The parse tree.
	 */
	public function enterIgnoreUnaryTest(Context\IgnoreUnaryTestContext $context) : void;
	/**
	 * Exit a parse tree produced by the `IgnoreUnaryTest` labeled alternative
	 * in {@see RebbValParser::unaryTest()}.
	 * @param $context The parse tree.
	 */
	public function exitIgnoreUnaryTest(Context\IgnoreUnaryTestContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see RebbValParser::positiveUnaryTest()}.
	 * @param $context The parse tree.
	 */
	public function enterPositiveUnaryTest(Context\PositiveUnaryTestContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see RebbValParser::positiveUnaryTest()}.
	 * @param $context The parse tree.
	 */
	public function exitPositiveUnaryTest(Context\PositiveUnaryTestContext $context) : void;
	/**
	 * Enter a parse tree produced by the `Compare`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterCompare(Context\CompareContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Compare` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitCompare(Context\CompareContext $context) : void;
	/**
	 * Enter a parse tree produced by the `Between`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterBetween(Context\BetweenContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Between` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitBetween(Context\BetweenContext $context) : void;
	/**
	 * Enter a parse tree produced by the `In`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterIn(Context\InContext $context) : void;
	/**
	 * Exit a parse tree produced by the `In` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitIn(Context\InContext $context) : void;
	/**
	 * Enter a parse tree produced by the `Contains`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterContains(Context\ContainsContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Contains` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitContains(Context\ContainsContext $context) : void;
	/**
	 * Enter a parse tree produced by the `NotEmpty`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterNotEmpty(Context\NotEmptyContext $context) : void;
	/**
	 * Exit a parse tree produced by the `NotEmpty` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitNotEmpty(Context\NotEmptyContext $context) : void;
	/**
	 * Enter a parse tree produced by the `MaxLength`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterMaxLength(Context\MaxLengthContext $context) : void;
	/**
	 * Exit a parse tree produced by the `MaxLength` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitMaxLength(Context\MaxLengthContext $context) : void;
	/**
	 * Enter a parse tree produced by the `Is`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterIs(Context\IsContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Is` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitIs(Context\IsContext $context) : void;
	/**
	 * Enter a parse tree produced by the `IsHex`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterIsHex(Context\IsHexContext $context) : void;
	/**
	 * Exit a parse tree produced by the `IsHex` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitIsHex(Context\IsHexContext $context) : void;
	/**
	 * Enter a parse tree produced by the `IsCustom`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterIsCustom(Context\IsCustomContext $context) : void;
	/**
	 * Exit a parse tree produced by the `IsCustom` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitIsCustom(Context\IsCustomContext $context) : void;
	/**
	 * Enter a parse tree produced by the `Match`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterMatch(Context\MatchContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Match` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitMatch(Context\MatchContext $context) : void;
	/**
	 * Enter a parse tree produced by the `AgeCompare`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterAgeCompare(Context\AgeCompareContext $context) : void;
	/**
	 * Exit a parse tree produced by the `AgeCompare` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitAgeCompare(Context\AgeCompareContext $context) : void;
	/**
	 * Enter a parse tree produced by the `StringPosition`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterStringPosition(Context\StringPositionContext $context) : void;
	/**
	 * Exit a parse tree produced by the `StringPosition` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitStringPosition(Context\StringPositionContext $context) : void;
	/**
	 * Enter a parse tree produced by the `Interval`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterInterval(Context\IntervalContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Interval` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitInterval(Context\IntervalContext $context) : void;
	/**
	 * Enter a parse tree produced by the `Array`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterArray(Context\ArrayContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Array` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitArray(Context\ArrayContext $context) : void;
	/**
	 * Enter a parse tree produced by the `string`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterString(Context\StringContext $context) : void;
	/**
	 * Exit a parse tree produced by the `string` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitString(Context\StringContext $context) : void;
	/**
	 * Enter a parse tree produced by the `number`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterNumber(Context\NumberContext $context) : void;
	/**
	 * Exit a parse tree produced by the `number` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitNumber(Context\NumberContext $context) : void;
	/**
	 * Enter a parse tree produced by the `date`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterDate(Context\DateContext $context) : void;
	/**
	 * Exit a parse tree produced by the `date` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitDate(Context\DateContext $context) : void;
	/**
	 * Enter a parse tree produced by the `time`
	 * labeled alternative in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterTime(Context\TimeContext $context) : void;
	/**
	 * Exit a parse tree produced by the `time` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitTime(Context\TimeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see RebbValParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayLiteral(Context\ArrayLiteralContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see RebbValParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayLiteral(Context\ArrayLiteralContext $context) : void;
}