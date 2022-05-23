<?php

namespace Php\Project\Lvl1\Games\Gcd;

use function Php\Project\Lvl1\Engine\{runGame, getRoundCount};

function play()
{
    $rules = 'Find the greatest common divisor of given numbers.';
    $questions = [];
    $answers = [];
    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $arg1 = rand($minNumber, $maxNumber);
        $arg2 = rand($minNumber, $maxNumber);
        $questions[] = implode(' ', [$arg1, $arg2]);
        $answers[] = nod($arg1, $arg2);
    }

    runGame($answers, $questions, $rules);
}

function nod(int $a, int $b): int
{
    return $a === 0 ? $b : nod($b % $a, $a);
}
