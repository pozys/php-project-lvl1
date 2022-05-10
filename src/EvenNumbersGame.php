<?php

namespace Php\Project\Lvl1\EvenNumbersGame;

use function cli\{line, prompt};
use function Php\Project\Lvl1\Cli\getUserName;

function play()
{
    $userName = getUserName();

    printRules();

    $threshold = 3;
    $rightAnswerCount = 0;
    $gotWrongAnswer = false;

    while ($rightAnswerCount < $threshold && !$gotWrongAnswer) {
        $pickedNumber = rand(0, 100000);

        line('Question: %d', $pickedNumber);
        $answer = prompt('Your answer');

        $rightAnswer = getRightAnswer($pickedNumber);

        if ($answer === $rightAnswer) {
            sayRightAnswer();
            $rightAnswerCount++;
        } else {
            sayWrongAnswer($answer, $rightAnswer, $userName);
            $gotWrongAnswer = true;
        }
    }

    if ($rightAnswerCount === $threshold) {
        line('Congratulations, %s!', $userName);
    }
}

function printRules()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

function sayRightAnswer()
{
    line('Correct!');
}

function sayWrongAnswer(string $wrongAnswer, string $rightAnswer, string $userName)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $wrongAnswer, $rightAnswer);
    line("Let's try again, %s!", $userName);
}

function getRightAnswer(int $number): string
{
    return isEvenNumber($number) ? 'yes' : 'no';
}

function isEvenNumber(int $number): bool
{
    return $number % 2 === 0;
}
