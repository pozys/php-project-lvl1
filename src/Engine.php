<?php

namespace Php\Project\Lvl1\Engine;

use function cli\{line, prompt};
use function Php\Project\Lvl1\Cli\getUserName;

function runGame(array $answers, array $questions, string $rules): void
{
    $userName = getUserName();
    line($rules);

    $roundLimit = getRoundCount();
    $isWinner = true;

    for ($i = 0; ($i < $roundLimit) && $isWinner; $i++) {
        $question = (string) $questions[$i];
        $rightAnswer = (string) $answers[$i];

        line('Question: %s', $question);
        $userAnswer =  prompt('Your answer');

        if ($userAnswer === $rightAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $rightAnswer);
            $isWinner = false;
        }
    }

    if ($isWinner) {
        line('Congratulations, %s!', $userName);
    } else {
        line("Let's try again, %s!", $userName);
    }
}

function getRoundCount(): int
{
    return 3;
}
