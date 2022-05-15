<?php

namespace Php\Project\Lvl1\Engine;

use function cli\{line, prompt};
use function Php\Project\Lvl1\Cli\getUserName as cliGetUserName;

function getUserName(): string
{
    return cliGetUserName();
}

function printRules(string $rules): void
{
    line($rules);
}

function getRoundCount(): int
{
    return 3;
}

function getSeparator(): string
{
    return ' ';
}

function getAnswer(string $question): string
{
    line('Question: %s', $question);
    return prompt('Your answer');
}

function getGameResult(array $questions, array $answers, string $userName): bool
{
    $roundLimit = getRoundCount();
    $isWinner = true;

    for ($i = 0; ($i < $roundLimit) && $isWinner; $i++) {
        $question = (string) $questions[$i];
        $rightAnswer = (string) $answers[$i];
        $userAnswer = getAnswer($question);

        if ($userAnswer === $rightAnswer) {
            sayRightAnswer();
        } else {
            sayWrongAnswer($userAnswer, $rightAnswer, $userName);
            $isWinner = false;
        }
    }

    return $isWinner;
}

function sayRightAnswer()
{
    line('Correct!');
}

function sayWrongAnswer(string $userAnswer, string $rightAnswer)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $rightAnswer);
}

function sayGoodbye(bool $isWinner, string $userName)
{
    if ($isWinner) {
        line('Congratulations, %s!', $userName);
    } else {
        line("Let's try again, %s!", $userName);
    }
}
