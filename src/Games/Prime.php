<?php

namespace Php\Project\Lvl1\Games\Prime;

use function Php\Project\Lvl1\Engine\{runGame, getRoundCount};

function play()
{
    $rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questions = [];
    $answers = [];

    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $question = rand($minNumber, $maxNumber);
        $questions[] = $question;

        $primes = getSuitablePrimes($question);
        $answers[] = isPrime($question, $primes) ? 'yes' : 'no';
    }

    runGame($answers, $questions, $rules);
}

function getSuitablePrimes(int $number, array $primes = []): array
{
    $threshold = ceil(sqrt($number));
    $minPrime = 2;

    if ($primes === []) {
        $primes[] = $minPrime;
    }

    $lastPrime = end($primes);

    if ($lastPrime >= $threshold) {
        return $primes;
    }

    for ($i = $lastPrime + 1; $i <= $threshold; $i += 2) {
        if (isPrime($i, $primes)) {
            $primes[] = $i;
        }
    }

    return $primes;
}

function isPrime(int $number, array $primes): bool
{
    foreach ($primes as $prime) {
        if (($number % $prime === 0) && ($number !== $prime)) {
            return false;
        }
    }

    return true;
}
