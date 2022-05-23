<?php

namespace Php\Project\Lvl1\Games\Progression;

use function Php\Project\Lvl1\Engine\{runGame, getRoundCount};

function play()
{
    $rules = 'What number is missing in the progression?';
    $questions = [];
    $answers = [];
    $placeholder = '..';

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
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
        $answers[] = $answer;
        $replaceableIndex = array_search($answer, $sequence);
        $sequence[$replaceableIndex] = $placeholder;
        $questions[] = implode(' ', $sequence);
    }

    runGame($answers, $questions, $rules);
}

function getMissingNumber(array $sequence): int
{
    $minNumber = 0;
    $replaceableIndex = rand($minNumber, count($sequence) - 1);

    return $sequence[$replaceableIndex];
}
