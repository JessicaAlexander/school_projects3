<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cost Calculator</title>
</head>
<body>
<?php 
// --------------
// -- Programmer:  [Jessica Alexander]
// -- Course:      ITSE-1306 (Intro to PHP)
// -- Instructor:  Cesar "Coach" Marrero
// -- Assignment:  [Chapter 10]
// -- Description: [Creating Functions]
// ---------------
class PasswordStrength {
	const STRENGTH_VERY_WEAK   = 0;
	const STRENGTH_WEAK        = 1;
	const STRENGTH_FAIR        = 2;
	const STRENGTH_STRONG      = 3;
	const STRENGTH_VERY_STRONG = 4;
	public function classifyScore($score) {
		if ($score <  0) return self::STRENGTH_VERY_WEAK;
		if ($score < 60) return self::STRENGTH_WEAK;
		if ($score < 70) return self::STRENGTH_FAIR;
		if ($score < 90) return self::STRENGTH_STRONG;
		return self::STRENGTH_VERY_STRONG;
	}
	public function classify($pw) {
		return $this->classifyScore($this->calculate($pw));
	}
	/**
	 * Calculate score for a password
	 *
	 * @param  string $pw  the password to work on
	 * @return int         score
	 */
	public function calculate($pw) {
		$length    = strlen($pw);
		$score     = $length * 4;
		$nUpper    = 0;
		$nLower    = 0;
		$nNum      = 0;
		$nSymbol   = 0;
		$locUpper  = array();
		$locLower  = array();
		$locNum    = array();
		$locSymbol = array();
		$charDict  = array();
		// count character classes
		for ($i = 0; $i < $length; ++$i) {
			$ch   = $pw[$i];
			$code = ord($ch);
			/* [0-9] */ if     ($code >= 48 && $code <= 57)  { $nNum++;    $locNum[]    = $i; }
			/* [A-Z] */ elseif ($code >= 65 && $code <= 90)  { $nUpper++;  $locUpper[]  = $i; }
			/* [a-z] */ elseif ($code >= 97 && $code <= 122) { $nLower++;  $locLower[]  = $i; }
			/* .     */ else                                 { $nSymbol++; $locSymbol[] = $i; }
			if (!isset($charDict[$ch])) {
				$charDict[$ch] = 1;
			}
			else {
				$charDict[$ch]++;
			}
		}
		// reward upper/lower characters if pw is not made up of only either one
		if ($nUpper !== $length && $nLower !== $length) {
			if ($nUpper !== 0) {
				$score += ($length - $nUpper) * 2;
			}
			if ($nLower !== 0) {
				$score += ($length - $nLower) * 2;
			}
		}
		// reward numbers if pw is not made up of only numbers
		if ($nNum !== $length) {
			$score += $nNum * 4;
		}
		// reward symbols
		$score += $nSymbol * 6;
		// middle number or symbol
		foreach (array($locNum, $locSymbol) as $list) {
			$reward = 0;
			foreach ($list as $i) {
				$reward += ($i !== 0 && $i !== $length -1) ? 1 : 0;
			}
			$score += $reward * 2;
		}
		// chars only
		if ($nUpper + $nLower === $length) {
			$score -= $length;
		}
		// numbers only
		if ($nNum === $length) {
			$score -= $length;
		}
		// repeating chars
		$repeats = 0;
		foreach ($charDict as $count) {
			if ($count > 1) {
				$repeats += $count - 1;
			}
		}
		if ($repeats > 0) {
			$score -= (int) (floor($repeats / ($length-$repeats)) + 1);
		}
		if ($length > 2) {
			// consecutive letters and numbers
			foreach (array('/[a-z]{2,}/', '/[A-Z]{2,}/', '/[0-9]{2,}/') as $re) {
				preg_match_all($re, $pw, $matches, PREG_SET_ORDER);
				if (!empty($matches)) {
					foreach ($matches as $match) {
						$score -= (strlen($match[0]) - 1) * 2;
					}
				}
			}
			// sequential letters
			$locLetters = array_merge($locUpper, $locLower);
			sort($locLetters);
			foreach ($this->findSequence($locLetters, mb_strtolower($pw)) as $seq) {
				if (count($seq) > 2) {
					$score -= (count($seq) - 2) * 2;
				}
			}
			// sequential numbers
			foreach ($this->findSequence($locNum, mb_strtolower($pw)) as $seq) {
				if (count($seq) > 2) {
					$score -= (count($seq) - 2) * 2;
				}
			}
		}
		return $score;
	}
}
?>