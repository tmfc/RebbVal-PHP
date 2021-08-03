<?php

/*
 * Generated from RebbVal.g4 by ANTLR 4.9
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see RebbValParser}.
 */
interface RebbValVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by the `Disjunction` labeled alternative
	 * in {@see RebbValParser::unaryTests()}.
	 *
	 * @param Context\DisjunctionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDisjunction(Context\DisjunctionContext $context);

	/**
	 * Visit a parse tree produced by the `Conjunction` labeled alternative
	 * in {@see RebbValParser::unaryTests()}.
	 *
	 * @param Context\ConjunctionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitConjunction(Context\ConjunctionContext $context);

	/**
	 * Visit a parse tree produced by the `SingleTest` labeled alternative
	 * in {@see RebbValParser::unaryTests()}.
	 *
	 * @param Context\SingleTestContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSingleTest(Context\SingleTestContext $context);

	/**
	 * Visit a parse tree produced by the `NormalUnaryTest` labeled alternative
	 * in {@see RebbValParser::unaryTest()}.
	 *
	 * @param Context\NormalUnaryTestContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNormalUnaryTest(Context\NormalUnaryTestContext $context);

	/**
	 * Visit a parse tree produced by the `NegationUnaryTest` labeled alternative
	 * in {@see RebbValParser::unaryTest()}.
	 *
	 * @param Context\NegationUnaryTestContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNegationUnaryTest(Context\NegationUnaryTestContext $context);

	/**
	 * Visit a parse tree produced by the `IgnoreUnaryTest` labeled alternative
	 * in {@see RebbValParser::unaryTest()}.
	 *
	 * @param Context\IgnoreUnaryTestContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIgnoreUnaryTest(Context\IgnoreUnaryTestContext $context);

	/**
	 * Visit a parse tree produced by {@see RebbValParser::positiveUnaryTest()}.
	 *
	 * @param Context\PositiveUnaryTestContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPositiveUnaryTest(Context\PositiveUnaryTestContext $context);

	/**
	 * Visit a parse tree produced by the `Compare` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\CompareContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCompare(Context\CompareContext $context);

	/**
	 * Visit a parse tree produced by the `Between` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\BetweenContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBetween(Context\BetweenContext $context);

	/**
	 * Visit a parse tree produced by the `In` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\InContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIn(Context\InContext $context);

	/**
	 * Visit a parse tree produced by the `Contains` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\ContainsContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitContains(Context\ContainsContext $context);

	/**
	 * Visit a parse tree produced by the `NotEmpty` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\NotEmptyContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNotEmpty(Context\NotEmptyContext $context);

	/**
	 * Visit a parse tree produced by the `MaxLength` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\MaxLengthContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMaxLength(Context\MaxLengthContext $context);

	/**
	 * Visit a parse tree produced by the `Is` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\IsContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIs(Context\IsContext $context);

	/**
	 * Visit a parse tree produced by the `IsHex` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\IsHexContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIsHex(Context\IsHexContext $context);

	/**
	 * Visit a parse tree produced by the `IsCustom` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\IsCustomContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIsCustom(Context\IsCustomContext $context);

	/**
	 * Visit a parse tree produced by the `Match` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\MatchContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMatch(Context\MatchContext $context);

	/**
	 * Visit a parse tree produced by the `AgeCompare` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\AgeCompareContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAgeCompare(Context\AgeCompareContext $context);

	/**
	 * Visit a parse tree produced by the `StringPosition` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\StringPositionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitStringPosition(Context\StringPositionContext $context);

	/**
	 * Visit a parse tree produced by the `Interval` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\IntervalContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitInterval(Context\IntervalContext $context);

	/**
	 * Visit a parse tree produced by the `Array` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\ArrayContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArray(Context\ArrayContext $context);

	/**
	 * Visit a parse tree produced by the `string` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\StringContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitString(Context\StringContext $context);

	/**
	 * Visit a parse tree produced by the `number` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\NumberContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNumber(Context\NumberContext $context);

	/**
	 * Visit a parse tree produced by the `date` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\DateContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDate(Context\DateContext $context);

	/**
	 * Visit a parse tree produced by the `time` labeled alternative
	 * in {@see RebbValParser::expression()}.
	 *
	 * @param Context\TimeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTime(Context\TimeContext $context);

	/**
	 * Visit a parse tree produced by {@see RebbValParser::arrayLiteral()}.
	 *
	 * @param Context\ArrayLiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayLiteral(Context\ArrayLiteralContext $context);
}