<?php

namespace Php\Project\Lvl1\Games\Progression;

use function Php\Project\Lvl1\Engine\runGame;

use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const GAME_RULE = 'What number is missing in the progression?';

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

        $length = rand($minLength, $maxLength);
        $replaceableIndex = rand($minInitial, count($sequence) - 1);

        for ($j = 0; $j < $length; $j++, $current += $difference) {
            if ($j === $replaceableIndex) {
                $sequence = $placeholder;
            } else {
                $sequence[] = $current;
            }
        }

        $question = implode(' ', $sequence);
        $answer = $sequence[$replaceableIndex];
        $questionsAnswers[$question] = compact('question', 'answer');
    }

    runGame($questionsAnswers, GAME_RULE);
}
