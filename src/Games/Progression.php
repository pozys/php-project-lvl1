<?php

namespace Php\Project\Lvl1\Games\Progression;

use function Php\Project\Lvl1\Engine\runGame;
use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const RULES = 'What number is missing in the progression?';

function play()
{
    $questionsAnswers = [];
    $placeholder = '..';

    for ($i = 0, $rounds = ROUND_COUNT; $i < $rounds; $i++) {
        $minDifference = 1;
        $maxDifference = 25;
        $difference = rand($minDifference, $maxDifference);

        $minInitial = 0;
        $maxInitial = 25;
        $current = rand($minInitial, $maxInitial);

        $sequence = [];
        $minLength = 5;
        $maxLength = 15;

        for ($j = 0, $length = rand($minLength, $maxLength); $j < $length; $j++, $current += $difference) {
            $sequence[] = $current;
        }

        $answer = getMissingNumber($sequence);
        $replaceableIndex = array_search($answer, $sequence, true);
        $sequence[$replaceableIndex] = $placeholder;
        $question = implode(' ', $sequence);
        $questionsAnswers[$question] = $answer;
    }

    runGame($questionsAnswers, RULES);
}

function getMissingNumber(array $sequence): int
{
    $minNumber = 0;
    $replaceableIndex = rand($minNumber, count($sequence) - 1);

    return $sequence[$replaceableIndex];
}
