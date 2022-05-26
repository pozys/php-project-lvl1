<?php

namespace Php\Project\Lvl1\Games\Gcd;

use function Php\Project\Lvl1\Engine\runGame;
use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const RULES = 'Find the greatest common divisor of given numbers.';

function play()
{
    $questionsAnswers = [];
    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $rounds = ROUND_COUNT; $i < $rounds; $i++) {
        $arg1 = rand($minNumber, $maxNumber);
        $arg2 = rand($minNumber, $maxNumber);
        $question = implode(' ', [$arg1, $arg2]);
        $questionsAnswers[$question] = getNOD($arg1, $arg2);
    }

    runGame($questionsAnswers, RULES);
}

function getNOD(int $a, int $b): int
{
    return $a === 0 ? $b : getNOD($b % $a, $a);
}
