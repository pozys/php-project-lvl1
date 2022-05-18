<?php

namespace Php\Project\Lvl1\Games\Progression;

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
    printRules('What number is missing in the progression?');

    [$questions, $answers] = getQuestionsAnswers();

    $isWinner = getGameResult($questions, $answers, $userName);

    sayGoodbye($isWinner, $userName);
}

function getQuestionsAnswers(): array
{
    $questions = [];
    $answers = [];

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $sequence = getSequence();
        $replaceableIndex = rand(0, count($sequence) - 1);
        $answers[] = $sequence[$replaceableIndex];
        $sequence[$replaceableIndex] = '..';
        $questions[] = implode(getSeparator(), $sequence);
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
    $difference = rand(1, 25);
    $current = rand(0, 25);

    for ($i = 0, $length = getSequenceLength(); $i < $length; $i++, $current += $difference) {
        $sequence[] = $current;
    }

    return $sequence;
}
