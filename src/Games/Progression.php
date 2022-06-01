<?php

namespace Php\Project\Lvl1\Games\Progression;

use function Php\Project\Lvl1\Engine\runGame;

use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const GAME_RULE = 'What number is missing in the progression?';

function play()
{
    $rounds = [];
    $placeholder = '..';

    $minDifference = 1;
    $maxDifference = 25;

    $minInitial = 0;
    $maxInitial = 25;

    $minSequenceLength = 5;
    $maxSequenceLength = 15;

    for ($i = 0, $roundCount = ROUND_COUNT; $i < $roundCount; $i++) {
        $difference = rand($minDifference, $maxDifference);

        $current = rand($minInitial, $maxInitial);

        $sequence = [];

        $length = rand($minSequenceLength, $maxSequenceLength);
        $replaceableIndex = rand($minInitial, $length - 1);
        $answer = null;

        for ($j = 0; $j < $length; $j++, $current += $difference) {
            if ($j === $replaceableIndex) {
                $sequence[] = $placeholder;
                $answer = $current;
            } else {
                $sequence[] = $current;
            }
        }

        $question = implode(' ', $sequence);
        $rounds[] = compact('question', 'answer');
    }

    runGame($rounds, GAME_RULE);
}
