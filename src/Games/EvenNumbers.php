<?php

namespace Php\Project\Lvl1\Games\EvenNumbers;

use function Php\Project\Lvl1\Engine\runGame;

use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function play()
{
    $questionsAnswers = [];
    $minNumber = 0;
    $maxNumber = 100000;

    for ($i = 0, $rounds = ROUND_COUNT; $i < $rounds; $i++) {
        $question = rand($minNumber, $maxNumber);
        $answer = isEven($question) ? 'yes' : 'no';
        $questionsAnswers[$question] = compact('question', 'answer');
    }

    runGame($questionsAnswers, GAME_RULE);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
