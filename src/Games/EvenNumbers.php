<?php

namespace Php\Project\Lvl1\Games\EvenNumbers;

use function Php\Project\Lvl1\Engine\{runGame, getRoundCount};

function play()
{
    $rules = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions = [];
    $answers = [];

    $minNumber = 0;
    $maxNumber = 100000;

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $question = rand($minNumber, $maxNumber);
        $questions[] = $question;
        $answers[] = isEven($question) ? 'yes' : 'no';
    }

    runGame($answers, $questions, $rules);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
