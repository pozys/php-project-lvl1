<?php

namespace Php\Project\Lvl1\Games\Calc;

use function Php\Project\Lvl1\Engine\{
    getUserName,
    printRules,
    getRoundCount,
    getSeparator,
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

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $operand = $operands[rand(0, $operandsCount - 1)];
        $arg1 = rand(0, 100);
        $arg2 = rand(0, 100);
        $questions[] = implode(getSeparator(), [$arg1, $operand, $arg2]);
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
    [$arg1, $operand, $arg2] = explode(getSeparator(), $question);

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
