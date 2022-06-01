<?php

namespace Php\Project\Lvl1\Games\EvenNumbers;

use function Php\Project\Lvl1\Engine\runGame;

use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function play()
{
    $rounds = [];
    $minNumber = 0;
    $maxNumber = 100000;

    for ($i = 0, $roundCount = ROUND_COUNT; $i < $roundCount; $i++) {
        $question = rand($minNumber, $maxNumber);
        $answer = isEven($question) ? 'yes' : 'no';
        $rounds[] = compact('question', 'answer');
    }

    runGame($rounds, GAME_RULE);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
