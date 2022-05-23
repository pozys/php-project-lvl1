<?php

namespace Php\Project\Lvl1\Games\Calc;

use function Php\Project\Lvl1\Engine\{runGame, getRoundCount};

function play()
{
    $rules = 'What is the result of the expression?';
    $questions = [];
    $answers = [];
    $operands = ['+', '-', '*'];
    $operandsCount = count($operands);
    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $operand = $operands[rand($minNumber, $operandsCount - 1)];
        $arg1 = rand($minNumber, $maxNumber);
        $arg2 = rand($minNumber, $maxNumber);

        $questions[] = implode(' ', [$arg1, $operand, $arg2]);
        $answers[] = calculate($arg1, $arg2, $operand);
    }

    runGame($answers, $questions, $rules);
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
