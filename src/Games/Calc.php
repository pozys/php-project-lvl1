<?php

namespace Php\Project\Lvl1\Games\Calc;

use function Php\Project\Lvl1\Engine\runGame;
use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const RULES = 'What is the result of the expression?';
const OPERANDS = ['+', '-', '*'];

function play()
{
    $questionsAnswers = [];    
    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $rounds = ROUND_COUNT; $i < $rounds; $i++) {
        $operand = OPERANDS[array_rand(OPERANDS)];
        $arg1 = rand($minNumber, $maxNumber);
        $arg2 = rand($minNumber, $maxNumber);

        $question = implode(' ', [$arg1, $operand, $arg2]);
        $questionsAnswers[$question] = calculate($arg1, $arg2, $operand);
    }

    runGame($questionsAnswers, RULES);
}

function calculate(int $arg1, int $arg2, string $operand): ?int
{
    switch ($operand) {
        case '+':
            return $arg1 + $arg2;
        case '-':
            return $arg1 - $arg2;
        case '*':
            return $arg1 * $arg2;
        default:
            return null;
    }
}
