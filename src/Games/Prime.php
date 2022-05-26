<?php

namespace Php\Project\Lvl1\Games\Prime;

use function Php\Project\Lvl1\Engine\runGame;
use const Php\Project\Lvl1\Engine\ROUND_COUNT;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function play()
{
    $questionsAnswers = [];
    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $rounds = ROUND_COUNT; $i < $rounds; $i++) {
        $question = rand($minNumber, $maxNumber);
        $questionsAnswers[$question] = isPrime($question) ? 'yes' : 'no';
    }

    runGame($questionsAnswers, RULES);
}

function isPrime(int $number): bool
{
    $minPrime = 2;

    if ($number < $minPrime) {
        return false;
    }

    for ($i = $minPrime, $threshold = ceil(sqrt($number)); $i <= $threshold; $i += 2) {
        if (($number % $i === 0) && ($number !== $i)) {
            return false;
        }
    }

    return true;
}
