<?php

namespace Php\Project\Lvl1\Engine;

use function cli\{line, prompt};

const ROUND_COUNT = 3;

function runGame(array $rounds, string $gameRule): void
{
    $userName = getUserName();
    line($gameRule);

    foreach ($rounds as ['question' => $question, 'answer' => $answer]) {
        line('Question: %s', (string) $question);
        $userAnswer =  prompt('Your answer');
        $rightAnswer = (string) $answer;

        if ($userAnswer === $rightAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $rightAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }

    line('Congratulations, %s!', $userName);
}

function getUserName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}
