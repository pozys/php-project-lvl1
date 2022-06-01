<?php

namespace Php\Project\Lvl1\Games\Gcd;

use function Php\Project\Lvl1\Engine\runGame;

use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const GAME_RULE = 'Find the greatest common divisor of given numbers.';

function play()
{
    $rounds = [];
    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $roundCount = ROUND_COUNT; $i < $roundCount; $i++) {
        $arg1 = rand($minNumber, $maxNumber);
        $arg2 = rand($minNumber, $maxNumber);
        $question = implode(' ', [$arg1, $arg2]);
        $answer = getGcd($arg1, $arg2);
        $rounds[] = compact('question', 'answer');
    }

    runGame($rounds, GAME_RULE);
}

function getGcd(int $a, int $b): int
{
    return $a === 0 ? $b : getGcd($b % $a, $a);
}
