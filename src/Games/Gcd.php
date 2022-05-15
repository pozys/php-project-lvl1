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

    $questions = getQuestions();
    $answers = getAnswers($questions);

    $isWinner = getGameResult($questions, $answers, $userName);

    sayGoodbye($isWinner, $userName);
}

function getQuestions(): array
{
    $questions = [];

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $arg1 = rand(0, 100);
        $arg2 = rand(0, 100);
        $questions[] = implode(getSeparator(), [$arg1, $arg2]);
    }

    return $questions;
}

function getAnswers(array $questions): array
{
    $answers = [];

    foreach ($questions as $question) {
        $answers[] = getRightAnswer($question);
    }

    return $answers;
}

function getRightAnswer(string $question)
{
    [$arg1, $arg2] = explode(getSeparator(), $question);

    return nod($arg1, $arg2);
}

function nod($a, $b)
{
    return $a ? nod($b % $a, $a) : $b;
}
