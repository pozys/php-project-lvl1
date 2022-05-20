<?php

namespace Php\Project\Lvl1\Games\Gcd;

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
    printRules('Find the greatest common divisor of given numbers.');

    [$questions, $answers] = getQuestionsAnswers();

    $isWinner = getGameResult($questions, $answers, $userName);

    sayGoodbye($isWinner, $userName);
}

function getQuestionsAnswers(): array
{
    $questions = [];
    $answers = [];

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $arg1 = rand(0, 100);
        $arg2 = rand(0, 100);
        $questions[] = implode(getSeparator(), [$arg1, $arg2]);
        $answers[] = getRightAnswer($arg1, $arg2);
    }

    return [$questions, $answers];
}

function getRightAnswer(int $arg1, int $arg2)
{
    return nod($arg1, $arg2);
}

function nod($a, $b)
{
    return $a ? nod($b % $a, $a) : $b;
}
