<?php

namespace Php\Project\Lvl1\Games\Prime;

use function Php\Project\Lvl1\Engine\{runGame, getRoundCount};

function play()
{
    $rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questions = getQuestions();
    $answers = getAnswers($questions);

    runGame($answers, $questions, $rules);
}

function getQuestions(): array
{
    $questions = [];
    $minNumber = 0;
    $maxNumber = 100;

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $questions[] = rand($minNumber, $maxNumber);
    }

    return $questions;
}

function getAnswers(array $questions): array
{
    $answers = [];

    foreach ($questions as $question) {
        $answers[] = getRightAnswer($question);
    }

    return $answers;
}

function getRightAnswer(int $question): string
{
    $primes = getSuitablePrimes($question);
    return isPrime($question, $primes) ? 'yes' : 'no';
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
