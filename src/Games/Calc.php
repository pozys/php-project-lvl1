<?php

namespace Php\Project\Lvl1\Games\Calc;

use function Php\Project\Lvl1\Engine\{
    getUserName,
    printRules,
    getRoundCount,
    getGameResult,
    sayGoodbye
};

function play()
{
    $userName = getUserName();
    printRules('What is the result of the expression?');

    $questions = getQuestions();
    $answers = getAnswers($questions);

    $isWinner = getGameResult($questions, $answers, $userName);

    sayGoodbye($isWinner, $userName);
}

function getQuestions(): array
{
    $questions = [];
    $operands = getOperands();
    $operandsCount = count($operands);
    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $operand = $operands[rand($minNumber, $operandsCount - 1)];
        $arg1 = rand($minNumber, $maxNumber);
        $arg2 = rand($minNumber, $maxNumber);
        $questions[] = implode(' ', [$arg1, $operand, $arg2]);
    }

    return $questions;
}

function getOperands(): array
{
    return ['+', '-', '*'];
}

function getAnswers(array $questions): array
{
    $answers = [];

    foreach ($questions as $question) {
        $answers[] = getRightAnswer($question);
    }

    return $answers;
}

function getRightAnswer(string $question): ?int
{
    if ($question === '') {
        return null;
    }

    [$arg1, $operand, $arg2] = explode(' ', $question);

    switch ($operand) {
        case '+':
            return (int) $arg1 + (int) $arg2;
        case '-':
            return (int) $arg1 - (int) $arg2;
        case '*':
            return (int) $arg1 * (int) $arg2;
        default:
            return null;
    }
}
