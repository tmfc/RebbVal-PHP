<?php

/*
 * Generated from RebbVal.g4 by ANTLR 4.9
 */

namespace Rebb\Val{
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class RebbValParser extends Parser
	{
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, T__8 = 9, T__9 = 10, T__10 = 11, T__11 = 12, 
               T__12 = 13, T__13 = 14, T__14 = 15, T__15 = 16, T__16 = 17, 
               T__17 = 18, T__18 = 19, T__19 = 20, T__20 = 21, T__21 = 22, 
               T__22 = 23, RegularExpressionLiteral = 24, StringLiteral = 25, 
               NumbericLiteral = 26, DateLiteral = 27, TimeLiteral = 28, 
               DIGITS = 29, YEAR = 30, MONTH = 31, DAY = 32, HOUR = 33, 
               MINUTE = 34, SECOND = 35, EQUAL = 36, NEQUAL = 37, LT = 38, 
               LTE = 39, GT = 40, GTE = 41, OLDER = 42, YOUNGER = 43, TRUE = 44, 
               FALSE = 45, LEAPYEAR = 46, LEAPDAY = 47, DOMAIN = 48, EMAIL = 49, 
               IPV4 = 50, IPV6 = 51, PRIVATEIP = 52, URL = 53, MAC = 54, 
               IMEI = 55, IMEISV = 56, ISBN = 57, PERCENTAGE = 58, BASE64 = 59, 
               NUMBER = 60, INT = 61, FLOAT = 62, COLOR = 63, PHONE = 64, 
               MOBILE = 65, UUID = 66, GBCODE = 67, ID = 68, PASSPORT = 69, 
               CustomFunction = 70, NEWLINE = 71, WS = 72;

		public const RULE_unaryTests = 0, RULE_unaryTest = 1, RULE_positiveUnaryTest = 2, 
               RULE_expression = 3, RULE_arrayLiteral = 4;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'unaryTests', 'unaryTest', 'positiveUnaryTest', 'expression', 'arrayLiteral'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'and'", "'or'", "'not'", "'('", "')'", "'-'", "'between'", 
		    "'in'", "'contains'", "'empty'", "'max'", "'length'", "'is'", "'hex'", 
		    "'match'", "'than'", "'starts'", "'ends'", "'with'", "']'", "'['", 
		    "'..'", "','", null, null, null, null, null, null, null, null, null, 
		    null, null, null, "'='", "'!='", "'<'", "'<='", "'>'", "'>='", "'older'", 
		    "'younger'", "'true'", "'false'", "'leapyear'", "'leapday'", "'domain'", 
		    "'email'", "'ipv4'", "'ipv6'", "'private_ip'", "'url'", "'MAC'", "'IMEI'", 
		    "'IMEISV'", "'ISBN'", "'percentage'", "'base64'", "'number'", "'int'", 
		    "'float'", "'color'", "'phone'", "'mobile'", "'UUID'", "'gbcode'", 
		    "'ID'", "'passport'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, "RegularExpressionLiteral", "StringLiteral", "NumbericLiteral", 
		    "DateLiteral", "TimeLiteral", "DIGITS", "YEAR", "MONTH", "DAY", "HOUR", 
		    "MINUTE", "SECOND", "EQUAL", "NEQUAL", "LT", "LTE", "GT", "GTE", "OLDER", 
		    "YOUNGER", "TRUE", "FALSE", "LEAPYEAR", "LEAPDAY", "DOMAIN", "EMAIL", 
		    "IPV4", "IPV6", "PRIVATEIP", "URL", "MAC", "IMEI", "IMEISV", "ISBN", 
		    "PERCENTAGE", "BASE64", "NUMBER", "INT", "FLOAT", "COLOR", "PHONE", 
		    "MOBILE", "UUID", "GBCODE", "ID", "PASSPORT", "CustomFunction", "NEWLINE", 
		    "WS"
		];

		/**
		 * @var string
		 */
		private const SERIALIZED_ATN =
			"\u{3}\u{608B}\u{A72A}\u{8133}\u{B9ED}\u{417C}\u{3BE7}\u{7786}\u{5964}" .
		    "\u{3}\u{4A}\u{60}\u{4}\u{2}\u{9}\u{2}\u{4}\u{3}\u{9}\u{3}\u{4}\u{4}" .
		    "\u{9}\u{4}\u{4}\u{5}\u{9}\u{5}\u{4}\u{6}\u{9}\u{6}\u{3}\u{2}\u{3}" .
		    "\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}" .
		    "\u{3}\u{2}\u{7}\u{2}\u{16}\u{A}\u{2}\u{C}\u{2}\u{E}\u{2}\u{19}\u{B}" .
		    "\u{2}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{5}\u{3}\u{1E}\u{A}\u{3}\u{3}" .
		    "\u{3}\u{3}\u{3}\u{5}\u{3}\u{22}\u{A}\u{3}\u{3}\u{3}\u{5}\u{3}\u{25}" .
		    "\u{A}\u{3}\u{3}\u{4}\u{3}\u{4}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}" .
		    "\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}" .
		    "\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}" .
		    "\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}" .
		    "\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}" .
		    "\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}" .
		    "\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{5}" .
		    "\u{5}\u{53}\u{A}\u{5}\u{3}\u{6}\u{3}\u{6}\u{3}\u{6}\u{3}\u{6}\u{7}" .
		    "\u{6}\u{59}\u{A}\u{6}\u{C}\u{6}\u{E}\u{6}\u{5C}\u{B}\u{6}\u{3}\u{6}" .
		    "\u{3}\u{6}\u{3}\u{6}\u{2}\u{3}\u{2}\u{7}\u{2}\u{4}\u{6}\u{8}\u{A}" .
		    "\u{2}\u{9}\u{3}\u{2}\u{26}\u{2B}\u{4}\u{2}\u{2E}\u{40}\u{42}\u{47}" .
		    "\u{4}\u{2}\u{3E}\u{3E}\u{41}\u{41}\u{3}\u{2}\u{2C}\u{2D}\u{3}\u{2}" .
		    "\u{13}\u{14}\u{4}\u{2}\u{6}\u{6}\u{16}\u{17}\u{4}\u{2}\u{7}\u{7}\u{16}" .
		    "\u{17}\u{2}\u{72}\u{2}\u{C}\u{3}\u{2}\u{2}\u{2}\u{4}\u{24}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{6}\u{26}\u{3}\u{2}\u{2}\u{2}\u{8}\u{52}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{A}\u{54}\u{3}\u{2}\u{2}\u{2}\u{C}\u{D}\u{8}\u{2}\u{1}\u{2}" .
		    "\u{D}\u{E}\u{5}\u{4}\u{3}\u{2}\u{E}\u{17}\u{3}\u{2}\u{2}\u{2}\u{F}" .
		    "\u{10}\u{C}\u{5}\u{2}\u{2}\u{10}\u{11}\u{7}\u{3}\u{2}\u{2}\u{11}\u{16}" .
		    "\u{5}\u{4}\u{3}\u{2}\u{12}\u{13}\u{C}\u{4}\u{2}\u{2}\u{13}\u{14}\u{7}" .
		    "\u{4}\u{2}\u{2}\u{14}\u{16}\u{5}\u{4}\u{3}\u{2}\u{15}\u{F}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{15}\u{12}\u{3}\u{2}\u{2}\u{2}\u{16}\u{19}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{17}\u{15}\u{3}\u{2}\u{2}\u{2}\u{17}\u{18}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{18}\u{3}\u{3}\u{2}\u{2}\u{2}\u{19}\u{17}\u{3}\u{2}\u{2}\u{2}\u{1A}" .
		    "\u{25}\u{5}\u{6}\u{4}\u{2}\u{1B}\u{1D}\u{7}\u{5}\u{2}\u{2}\u{1C}\u{1E}" .
		    "\u{7}\u{6}\u{2}\u{2}\u{1D}\u{1C}\u{3}\u{2}\u{2}\u{2}\u{1D}\u{1E}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{1E}\u{1F}\u{3}\u{2}\u{2}\u{2}\u{1F}\u{21}\u{5}\u{6}" .
		    "\u{4}\u{2}\u{20}\u{22}\u{7}\u{7}\u{2}\u{2}\u{21}\u{20}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{21}\u{22}\u{3}\u{2}\u{2}\u{2}\u{22}\u{25}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{23}\u{25}\u{7}\u{8}\u{2}\u{2}\u{24}\u{1A}\u{3}\u{2}\u{2}\u{2}\u{24}" .
		    "\u{1B}\u{3}\u{2}\u{2}\u{2}\u{24}\u{23}\u{3}\u{2}\u{2}\u{2}\u{25}\u{5}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{26}\u{27}\u{5}\u{8}\u{5}\u{2}\u{27}\u{7}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{28}\u{29}\u{9}\u{2}\u{2}\u{2}\u{29}\u{53}\u{5}\u{8}" .
		    "\u{5}\u{2}\u{2A}\u{2B}\u{7}\u{9}\u{2}\u{2}\u{2B}\u{2C}\u{5}\u{8}\u{5}" .
		    "\u{2}\u{2C}\u{2D}\u{7}\u{3}\u{2}\u{2}\u{2D}\u{2E}\u{5}\u{8}\u{5}\u{2}" .
		    "\u{2E}\u{53}\u{3}\u{2}\u{2}\u{2}\u{2F}\u{30}\u{7}\u{A}\u{2}\u{2}\u{30}" .
		    "\u{53}\u{5}\u{8}\u{5}\u{2}\u{31}\u{32}\u{7}\u{B}\u{2}\u{2}\u{32}\u{53}" .
		    "\u{5}\u{8}\u{5}\u{2}\u{33}\u{34}\u{7}\u{5}\u{2}\u{2}\u{34}\u{53}\u{7}" .
		    "\u{C}\u{2}\u{2}\u{35}\u{36}\u{7}\u{D}\u{2}\u{2}\u{36}\u{37}\u{7}\u{E}" .
		    "\u{2}\u{2}\u{37}\u{53}\u{7}\u{1C}\u{2}\u{2}\u{38}\u{39}\u{7}\u{F}" .
		    "\u{2}\u{2}\u{39}\u{53}\u{9}\u{3}\u{2}\u{2}\u{3A}\u{3B}\u{7}\u{F}\u{2}" .
		    "\u{2}\u{3B}\u{3C}\u{7}\u{10}\u{2}\u{2}\u{3C}\u{53}\u{9}\u{4}\u{2}" .
		    "\u{2}\u{3D}\u{3E}\u{7}\u{F}\u{2}\u{2}\u{3E}\u{53}\u{7}\u{48}\u{2}" .
		    "\u{2}\u{3F}\u{40}\u{7}\u{11}\u{2}\u{2}\u{40}\u{53}\u{7}\u{1A}\u{2}" .
		    "\u{2}\u{41}\u{42}\u{9}\u{5}\u{2}\u{2}\u{42}\u{43}\u{7}\u{12}\u{2}" .
		    "\u{2}\u{43}\u{53}\u{5}\u{8}\u{5}\u{2}\u{44}\u{45}\u{9}\u{6}\u{2}\u{2}" .
		    "\u{45}\u{46}\u{7}\u{15}\u{2}\u{2}\u{46}\u{53}\u{5}\u{8}\u{5}\u{2}" .
		    "\u{47}\u{48}\u{9}\u{7}\u{2}\u{2}\u{48}\u{49}\u{5}\u{8}\u{5}\u{2}\u{49}" .
		    "\u{4A}\u{7}\u{18}\u{2}\u{2}\u{4A}\u{4B}\u{5}\u{8}\u{5}\u{2}\u{4B}" .
		    "\u{4C}\u{9}\u{8}\u{2}\u{2}\u{4C}\u{53}\u{3}\u{2}\u{2}\u{2}\u{4D}\u{53}" .
		    "\u{5}\u{A}\u{6}\u{2}\u{4E}\u{53}\u{7}\u{1B}\u{2}\u{2}\u{4F}\u{53}" .
		    "\u{7}\u{1C}\u{2}\u{2}\u{50}\u{53}\u{7}\u{1D}\u{2}\u{2}\u{51}\u{53}" .
		    "\u{7}\u{1E}\u{2}\u{2}\u{52}\u{28}\u{3}\u{2}\u{2}\u{2}\u{52}\u{2A}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{52}\u{2F}\u{3}\u{2}\u{2}\u{2}\u{52}\u{31}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{52}\u{33}\u{3}\u{2}\u{2}\u{2}\u{52}\u{35}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{52}\u{38}\u{3}\u{2}\u{2}\u{2}\u{52}\u{3A}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{52}\u{3D}\u{3}\u{2}\u{2}\u{2}\u{52}\u{3F}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{52}\u{41}\u{3}\u{2}\u{2}\u{2}\u{52}\u{44}\u{3}\u{2}\u{2}\u{2}\u{52}" .
		    "\u{47}\u{3}\u{2}\u{2}\u{2}\u{52}\u{4D}\u{3}\u{2}\u{2}\u{2}\u{52}\u{4E}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{52}\u{4F}\u{3}\u{2}\u{2}\u{2}\u{52}\u{50}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{52}\u{51}\u{3}\u{2}\u{2}\u{2}\u{53}\u{9}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{54}\u{55}\u{7}\u{17}\u{2}\u{2}\u{55}\u{5A}\u{7}\u{1C}" .
		    "\u{2}\u{2}\u{56}\u{57}\u{7}\u{19}\u{2}\u{2}\u{57}\u{59}\u{7}\u{1C}" .
		    "\u{2}\u{2}\u{58}\u{56}\u{3}\u{2}\u{2}\u{2}\u{59}\u{5C}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{5A}\u{58}\u{3}\u{2}\u{2}\u{2}\u{5A}\u{5B}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{5B}\u{5D}\u{3}\u{2}\u{2}\u{2}\u{5C}\u{5A}\u{3}\u{2}\u{2}\u{2}\u{5D}" .
		    "\u{5E}\u{7}\u{16}\u{2}\u{2}\u{5E}\u{B}\u{3}\u{2}\u{2}\u{2}\u{9}\u{15}" .
		    "\u{17}\u{1D}\u{21}\u{24}\u{52}\u{5A}";

		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize() : void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.9', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName() : string
		{
			return "RebbVal.g4";
		}

		public function getRuleNames() : array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN() : string
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN() : ATN
		{
			return self::$atn;
		}

		public function getVocabulary() : Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function unaryTests() : Context\UnaryTestsContext
		{
			return $this->recursiveUnaryTests(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveUnaryTests(int $precedence) : Context\UnaryTestsContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\UnaryTestsContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 0;
			$this->enterRecursionRule($localContext, 0, self::RULE_unaryTests, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$localContext = new Context\SingleTestContext($localContext);
				$this->ctx = $localContext;
				$previousContext = $localContext;

				$this->setState(11);
				$this->unaryTest();
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(21);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(19);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 0, $this->ctx)) {
							case 1:
							    $localContext = new Context\ConjunctionContext(new Context\UnaryTestsContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_unaryTests);
							    $this->setState(13);

							    if (!($this->precpred($this->ctx, 3))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 3)");
							    }
							    $this->setState(14);
							    $this->match(self::T__0);
							    $this->setState(15);
							    $this->unaryTest();
							break;

							case 2:
							    $localContext = new Context\DisjunctionContext(new Context\UnaryTestsContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_unaryTests);
							    $this->setState(16);

							    if (!($this->precpred($this->ctx, 2))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
							    }
							    $this->setState(17);
							    $this->match(self::T__1);
							    $this->setState(18);
							    $this->unaryTest();
							break;
						} 
					}

					$this->setState(23);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function unaryTest() : Context\UnaryTestContext
		{
		    $localContext = new Context\UnaryTestContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_unaryTest);

		    try {
		        $this->setState(34);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 4, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\NormalUnaryTestContext($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(24);
		        	    $this->positiveUnaryTest();
		        	break;

		        	case 2:
		        	    $localContext = new Context\NegationUnaryTestContext($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(25);
		        	    $this->match(self::T__2);
		        	    $this->setState(27);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 2, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(26);
		        	    	    $this->match(self::T__3);
		        	    	break;
		        	    }
		        	    $this->setState(29);
		        	    $this->positiveUnaryTest();
		        	    $this->setState(31);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 3, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(30);
		        	    	    $this->match(self::T__4);
		        	    	break;
		        	    }
		        	break;

		        	case 3:
		        	    $localContext = new Context\IgnoreUnaryTestContext($localContext);
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(33);
		        	    $this->match(self::T__5);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function positiveUnaryTest() : Context\PositiveUnaryTestContext
		{
		    $localContext = new Context\PositiveUnaryTestContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_positiveUnaryTest);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(36);
		        $this->expression();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expression() : Context\ExpressionContext
		{
		    $localContext = new Context\ExpressionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_expression);

		    try {
		        $this->setState(80);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 5, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\CompareContext($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(38);

		        	    $localContext->op = $this->input->LT(1);
		        	    $_la = $this->input->LA(1);

		        	    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::EQUAL) | (1 << self::NEQUAL) | (1 << self::LT) | (1 << self::LTE) | (1 << self::GT) | (1 << self::GTE))) !== 0))) {
		        	    	    $localContext->op = $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	    $this->setState(39);
		        	    $this->expression();
		        	break;

		        	case 2:
		        	    $localContext = new Context\BetweenContext($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(40);
		        	    $this->match(self::T__6);
		        	    $this->setState(41);
		        	    $this->expression();
		        	    $this->setState(42);
		        	    $this->match(self::T__0);
		        	    $this->setState(43);
		        	    $this->expression();
		        	break;

		        	case 3:
		        	    $localContext = new Context\InContext($localContext);
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(45);
		        	    $this->match(self::T__7);
		        	    $this->setState(46);
		        	    $this->expression();
		        	break;

		        	case 4:
		        	    $localContext = new Context\ContainsContext($localContext);
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(47);
		        	    $this->match(self::T__8);
		        	    $this->setState(48);
		        	    $this->expression();
		        	break;

		        	case 5:
		        	    $localContext = new Context\NotEmptyContext($localContext);
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(49);
		        	    $this->match(self::T__2);
		        	    $this->setState(50);
		        	    $this->match(self::T__9);
		        	break;

		        	case 6:
		        	    $localContext = new Context\MaxLengthContext($localContext);
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(51);
		        	    $this->match(self::T__10);
		        	    $this->setState(52);
		        	    $this->match(self::T__11);
		        	    $this->setState(53);
		        	    $this->match(self::NumbericLiteral);
		        	break;

		        	case 7:
		        	    $localContext = new Context\IsContext($localContext);
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(54);
		        	    $this->match(self::T__12);
		        	    $this->setState(55);

		        	    $localContext->type = $this->input->LT(1);
		        	    $_la = $this->input->LA(1);

		        	    if (!((((($_la - 44)) & ~0x3f) === 0 && ((1 << ($_la - 44)) & ((1 << (self::TRUE - 44)) | (1 << (self::FALSE - 44)) | (1 << (self::LEAPYEAR - 44)) | (1 << (self::LEAPDAY - 44)) | (1 << (self::DOMAIN - 44)) | (1 << (self::EMAIL - 44)) | (1 << (self::IPV4 - 44)) | (1 << (self::IPV6 - 44)) | (1 << (self::PRIVATEIP - 44)) | (1 << (self::URL - 44)) | (1 << (self::MAC - 44)) | (1 << (self::IMEI - 44)) | (1 << (self::IMEISV - 44)) | (1 << (self::ISBN - 44)) | (1 << (self::PERCENTAGE - 44)) | (1 << (self::BASE64 - 44)) | (1 << (self::NUMBER - 44)) | (1 << (self::INT - 44)) | (1 << (self::FLOAT - 44)) | (1 << (self::PHONE - 44)) | (1 << (self::MOBILE - 44)) | (1 << (self::UUID - 44)) | (1 << (self::GBCODE - 44)) | (1 << (self::ID - 44)) | (1 << (self::PASSPORT - 44)))) !== 0))) {
		        	    	    $localContext->type = $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	break;

		        	case 8:
		        	    $localContext = new Context\IsHexContext($localContext);
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(56);
		        	    $this->match(self::T__12);
		        	    $this->setState(57);
		        	    $this->match(self::T__13);
		        	    $this->setState(58);

		        	    $localContext->type = $this->input->LT(1);
		        	    $_la = $this->input->LA(1);

		        	    if (!($_la === self::NUMBER || $_la === self::COLOR)) {
		        	    	    $localContext->type = $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	break;

		        	case 9:
		        	    $localContext = new Context\IsCustomContext($localContext);
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(59);
		        	    $this->match(self::T__12);
		        	    $this->setState(60);
		        	    $localContext->type = $this->match(self::CustomFunction);
		        	break;

		        	case 10:
		        	    $localContext = new Context\MatchContext($localContext);
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(61);
		        	    $this->match(self::T__14);
		        	    $this->setState(62);
		        	    $localContext->regex = $this->match(self::RegularExpressionLiteral);
		        	break;

		        	case 11:
		        	    $localContext = new Context\AgeCompareContext($localContext);
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(63);

		        	    $localContext->op = $this->input->LT(1);
		        	    $_la = $this->input->LA(1);

		        	    if (!($_la === self::OLDER || $_la === self::YOUNGER)) {
		        	    	    $localContext->op = $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	    $this->setState(64);
		        	    $this->match(self::T__15);
		        	    $this->setState(65);
		        	    $this->expression();
		        	break;

		        	case 12:
		        	    $localContext = new Context\StringPositionContext($localContext);
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(66);

		        	    $localContext->op = $this->input->LT(1);
		        	    $_la = $this->input->LA(1);

		        	    if (!($_la === self::T__16 || $_la === self::T__17)) {
		        	    	    $localContext->op = $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	    $this->setState(67);
		        	    $this->match(self::T__18);
		        	    $this->setState(68);
		        	    $this->expression();
		        	break;

		        	case 13:
		        	    $localContext = new Context\IntervalContext($localContext);
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(69);

		        	    $localContext->start = $this->input->LT(1);
		        	    $_la = $this->input->LA(1);

		        	    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::T__3) | (1 << self::T__19) | (1 << self::T__20))) !== 0))) {
		        	    	    $localContext->start = $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	    $this->setState(70);
		        	    $this->expression();
		        	    $this->setState(71);
		        	    $this->match(self::T__21);
		        	    $this->setState(72);
		        	    $this->expression();
		        	    $this->setState(73);

		        	    $localContext->end = $this->input->LT(1);
		        	    $_la = $this->input->LA(1);

		        	    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::T__4) | (1 << self::T__19) | (1 << self::T__20))) !== 0))) {
		        	    	    $localContext->end = $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	break;

		        	case 14:
		        	    $localContext = new Context\ArrayContext($localContext);
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(75);
		        	    $this->arrayLiteral();
		        	break;

		        	case 15:
		        	    $localContext = new Context\StringContext($localContext);
		        	    $this->enterOuterAlt($localContext, 15);
		        	    $this->setState(76);
		        	    $this->match(self::StringLiteral);
		        	break;

		        	case 16:
		        	    $localContext = new Context\NumberContext($localContext);
		        	    $this->enterOuterAlt($localContext, 16);
		        	    $this->setState(77);
		        	    $this->match(self::NumbericLiteral);
		        	break;

		        	case 17:
		        	    $localContext = new Context\DateContext($localContext);
		        	    $this->enterOuterAlt($localContext, 17);
		        	    $this->setState(78);
		        	    $this->match(self::DateLiteral);
		        	break;

		        	case 18:
		        	    $localContext = new Context\TimeContext($localContext);
		        	    $this->enterOuterAlt($localContext, 18);
		        	    $this->setState(79);
		        	    $this->match(self::TimeLiteral);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayLiteral() : Context\ArrayLiteralContext
		{
		    $localContext = new Context\ArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(82);
		        $this->match(self::T__20);
		        $this->setState(83);
		        $this->match(self::NumbericLiteral);
		        $this->setState(88);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__22) {
		        	$this->setState(84);
		        	$this->match(self::T__22);
		        	$this->setState(85);
		        	$this->match(self::NumbericLiteral);
		        	$this->setState(90);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(91);
		        $this->match(self::T__19);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex) : bool
		{
			switch ($ruleIndex) {
					case 0:
						return $this->sempredUnaryTests($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredUnaryTests(?Context\UnaryTestsContext $localContext, int $predicateIndex) : bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 3);

			    case 1:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}
	}
}

namespace RebbVal\Val\Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use RebbVal\Val\RebbValParser;
	use RebbValVisitor;
	use RebbValListener;

	class UnaryTestsContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return RebbValParser::RULE_unaryTests;
	    }
	 
		public function copyFrom(ParserRuleContext $context) : void
		{
			parent::copyFrom($context);

		}
	}

	class DisjunctionContext extends UnaryTestsContext
	{
		public function __construct(UnaryTestsContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function unaryTests() : ?UnaryTestsContext
	    {
	    	return $this->getTypedRuleContext(UnaryTestsContext::class, 0);
	    }

	    public function unaryTest() : ?UnaryTestContext
	    {
	    	return $this->getTypedRuleContext(UnaryTestContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterDisjunction($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitDisjunction($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitDisjunction($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ConjunctionContext extends UnaryTestsContext
	{
		public function __construct(UnaryTestsContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function unaryTests() : ?UnaryTestsContext
	    {
	    	return $this->getTypedRuleContext(UnaryTestsContext::class, 0);
	    }

	    public function unaryTest() : ?UnaryTestContext
	    {
	    	return $this->getTypedRuleContext(UnaryTestContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterConjunction($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitConjunction($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitConjunction($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class SingleTestContext extends UnaryTestsContext
	{
		public function __construct(UnaryTestsContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function unaryTest() : ?UnaryTestContext
	    {
	    	return $this->getTypedRuleContext(UnaryTestContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterSingleTest($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitSingleTest($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitSingleTest($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class UnaryTestContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return RebbValParser::RULE_unaryTest;
	    }
	 
		public function copyFrom(ParserRuleContext $context) : void
		{
			parent::copyFrom($context);

		}
	}

	class IgnoreUnaryTestContext extends UnaryTestContext
	{
		public function __construct(UnaryTestContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterIgnoreUnaryTest($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitIgnoreUnaryTest($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitIgnoreUnaryTest($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class NormalUnaryTestContext extends UnaryTestContext
	{
		public function __construct(UnaryTestContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function positiveUnaryTest() : ?PositiveUnaryTestContext
	    {
	    	return $this->getTypedRuleContext(PositiveUnaryTestContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterNormalUnaryTest($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitNormalUnaryTest($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitNormalUnaryTest($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class NegationUnaryTestContext extends UnaryTestContext
	{
		public function __construct(UnaryTestContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function positiveUnaryTest() : ?PositiveUnaryTestContext
	    {
	    	return $this->getTypedRuleContext(PositiveUnaryTestContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterNegationUnaryTest($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitNegationUnaryTest($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitNegationUnaryTest($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PositiveUnaryTestContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return RebbValParser::RULE_positiveUnaryTest;
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterPositiveUnaryTest($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitPositiveUnaryTest($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitPositiveUnaryTest($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return RebbValParser::RULE_expression;
	    }
	 
		public function copyFrom(ParserRuleContext $context) : void
		{
			parent::copyFrom($context);

		}
	}

	class DateContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function DateLiteral() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::DateLiteral, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterDate($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitDate($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitDate($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class AgeCompareContext extends ExpressionContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function OLDER() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::OLDER, 0);
	    }

	    public function YOUNGER() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::YOUNGER, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterAgeCompare($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitAgeCompare($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitAgeCompare($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StringContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function StringLiteral() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::StringLiteral, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterString($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitString($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitString($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class InContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterIn($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitIn($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitIn($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IsCustomContext extends ExpressionContext
	{
		/**
		 * @var Token|null $type
		 */
		public $type;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function CustomFunction() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::CustomFunction, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterIsCustom($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitIsCustom($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitIsCustom($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class BetweenContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterBetween($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitBetween($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitBetween($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IsContext extends ExpressionContext
	{
		/**
		 * @var Token|null $type
		 */
		public $type;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function TRUE() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::TRUE, 0);
	    }

	    public function FALSE() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::FALSE, 0);
	    }

	    public function LEAPYEAR() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::LEAPYEAR, 0);
	    }

	    public function LEAPDAY() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::LEAPDAY, 0);
	    }

	    public function DOMAIN() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::DOMAIN, 0);
	    }

	    public function EMAIL() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::EMAIL, 0);
	    }

	    public function IPV4() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::IPV4, 0);
	    }

	    public function IPV6() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::IPV6, 0);
	    }

	    public function PRIVATEIP() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::PRIVATEIP, 0);
	    }

	    public function URL() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::URL, 0);
	    }

	    public function MAC() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::MAC, 0);
	    }

	    public function IMEI() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::IMEI, 0);
	    }

	    public function IMEISV() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::IMEISV, 0);
	    }

	    public function ISBN() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::ISBN, 0);
	    }

	    public function PERCENTAGE() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::PERCENTAGE, 0);
	    }

	    public function BASE64() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::BASE64, 0);
	    }

	    public function NUMBER() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::NUMBER, 0);
	    }

	    public function INT() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::INT, 0);
	    }

	    public function FLOAT() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::FLOAT, 0);
	    }

	    public function PHONE() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::PHONE, 0);
	    }

	    public function MOBILE() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::MOBILE, 0);
	    }

	    public function UUID() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::UUID, 0);
	    }

	    public function GBCODE() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::GBCODE, 0);
	    }

	    public function ID() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::ID, 0);
	    }

	    public function PASSPORT() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::PASSPORT, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterIs($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitIs($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitIs($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IsHexContext extends ExpressionContext
	{
		/**
		 * @var Token|null $type
		 */
		public $type;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function COLOR() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::COLOR, 0);
	    }

	    public function NUMBER() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::NUMBER, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterIsHex($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitIsHex($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitIsHex($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class MaxLengthContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function NumbericLiteral() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::NumbericLiteral, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterMaxLength($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitMaxLength($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitMaxLength($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StringPositionContext extends ExpressionContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterStringPosition($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitStringPosition($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitStringPosition($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class MatchContext extends ExpressionContext
	{
		/**
		 * @var Token|null $regex
		 */
		public $regex;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function RegularExpressionLiteral() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::RegularExpressionLiteral, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterMatch($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitMatch($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitMatch($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ArrayContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function arrayLiteral() : ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterArray($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitArray($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitArray($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class NumberContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function NumbericLiteral() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::NumbericLiteral, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterNumber($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitNumber($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitNumber($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ContainsContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterContains($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitContains($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitContains($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class CompareContext extends ExpressionContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function EQUAL() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::EQUAL, 0);
	    }

	    public function NEQUAL() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::NEQUAL, 0);
	    }

	    public function LT() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::LT, 0);
	    }

	    public function LTE() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::LTE, 0);
	    }

	    public function GT() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::GT, 0);
	    }

	    public function GTE() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::GTE, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterCompare($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitCompare($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitCompare($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class NotEmptyContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterNotEmpty($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitNotEmpty($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitNotEmpty($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class TimeContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function TimeLiteral() : ?TerminalNode
	    {
	        return $this->getToken(RebbValParser::TimeLiteral, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterTime($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitTime($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitTime($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IntervalContext extends ExpressionContext
	{
		/**
		 * @var Token|null $start
		 */
		public $start;

		/**
		 * @var Token|null $end
		 */
		public $end;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterInterval($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitInterval($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitInterval($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return RebbValParser::RULE_arrayLiteral;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function NumbericLiteral(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(RebbValParser::NumbericLiteral);
	    	}

	        return $this->getToken(RebbValParser::NumbericLiteral, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->enterArrayLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof RebbValListener) {
			    $listener->exitArrayLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof RebbValVisitor) {
			    return $visitor->visitArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}