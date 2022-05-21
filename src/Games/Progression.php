<?php

namespace Php\Project\Lvl1\Games\Progression;

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
    printRules('What number is missing in the progression?');

    [$questions, $answers] = getQuestionsAnswers();

    $isWinner = getGameResult($questions, $answers, $userName);

    sayGoodbye($isWinner, $userName);
}

function getQuestionsAnswers(): array
{
    $questions = [];
    $answers = [];
    $minNumber = 0;
    $placeholder = '..';

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $sequence = getSequence();
        $replaceableIndex = rand($minNumber, count($sequence) - 1);
        $answers[] = $sequence[$replaceableIndex];
        $sequence[$replaceableIndex] = $placeholder;
        $questions[] = implode(' ', $sequence);
    }

    return [$questions, $answers];
}

function getSequenceLength(): int
{
    $minLength = 5;
    $maxLength = 15;

    return rand($minLength, $maxLength);
}

function getSequence(): array
{
    $sequence = [];

    $minDifference = 1;
    $maxDifference = 25;
    $minInitial = 0;
    $maxInitial = 25;

    $difference = rand($minDifference, $maxDifference);
    $current = rand($minInitial, $maxInitial);

    for ($i = 0, $length = getSequenceLength(); $i < $length; $i++, $current += $difference) {
        $sequence[] = $current;
    }

    return $sequence;
}
