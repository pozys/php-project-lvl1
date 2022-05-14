<?php

namespace Php\Project\Lvl1\Games\EvenNumbers;

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
    printRules('Answer "yes" if the number is even, otherwise answer "no".');

    $questions = getQuestions();
    $answers = getAnswers($questions);

    $isWinner = getGameResult($questions, $answers, $userName);

    sayGoodbye($isWinner, $userName);
}

function getQuestions(): array
{
    $questions = [];

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $questions[] = rand(0, 100000);
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

function getRightAnswer(int $number): string
{
    return ($number % 2 === 0) ? 'yes' : 'no';
}
