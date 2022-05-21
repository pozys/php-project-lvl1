<?php

namespace Php\Project\Lvl1\Games\Prime;

use function Php\Project\Lvl1\Engine\{
    getUserName,
    printRules,
    getRoundCount,
    getSeparator,
    getGameResult,
    sayGoodbye
};

function play()
{
    $userName = getUserName();
    printRules('Answer "yes" if given number is prime. Otherwise answer "no".');

    $questions = getQuestions();
    $answers = getAnswers($questions);

    $isWinner = getGameResult($questions, $answers, $userName);

    sayGoodbye($isWinner, $userName);
}

function getQuestions(): array
{
    $questions = [];

    for ($i = 0, $rounds = getRoundCount(); $i < $rounds; $i++) {
        $questions[] = rand(1, 1000);
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

    if (!$primes) {
        $primes[] = 2;
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
        if ($number % $prime === 0) {
            return false;
        }
    }

    return true;
}
