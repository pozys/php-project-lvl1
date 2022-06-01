<?php

namespace Php\Project\Lvl1\Games\Calc;

use Error;

use function Php\Project\Lvl1\Engine\runGame;

use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const GAME_RULE = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

function play()
{
    $rounds = [];
    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $roundCount = ROUND_COUNT; $i < $roundCount; $i++) {
        $operator = OPERATORS[array_rand(OPERATORS)];
        $arg1 = rand($minNumber, $maxNumber);
        $arg2 = rand($minNumber, $maxNumber);

        $question = implode(' ', [$arg1, $operator, $arg2]);
        $answer = calculate($arg1, $arg2, $operator);
        $rounds[$question] = compact('question', 'answer');
    }

    runGame($rounds, GAME_RULE);
}

function calculate(int $arg1, int $arg2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $arg1 + $arg2;
        case '-':
            return $arg1 - $arg2;
        case '*':
            return $arg1 * $arg2;
        default:
            throw new Error("Unknown operator: ${operator}");
    }
}
