<?php

namespace Php\Project\Lvl1\Games\Prime;

use function Php\Project\Lvl1\Engine\runGame;

use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const GAME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function play()
{
    $rounds = [];
    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $roundCount = ROUND_COUNT; $i < $roundCount; $i++) {
        $question = rand($minNumber, $maxNumber);
        $answer = isPrime($question) ? 'yes' : 'no';
        $rounds[$question] = compact('question', 'answer');
    }

    runGame($rounds, GAME_RULE);
}

function isPrime(int $number): bool
{
    $minPrime = 2;

    if ($number < $minPrime) {
        return false;
    }

    for ($i = $minPrime, $threshold = ceil(sqrt($number)); $i <= $threshold; $i++) {
        if (($number % $i === 0) && ($number !== $i)) {
            return false;
        }
    }

    return true;
}
