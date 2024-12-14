<?php

function evaluateQuiz(array $questions, array $answers): int
{
    $score = 0;
    foreach ($questions as $index => $question) {
        if ($answers[$index] && strtolower($answers[$index]) === strtolower($question['correct'])) {
            $score++;
        }
    }
    return $score;
}

$questions = [
    ['question' => 'What is 2 + 2?', 'correct' => '4'],
    ['question' => 'What is the capital of France?', 'correct' => 'Paris'],
    ['question' => 'Who wrote "Hamlet"?', 'correct' => 'Shakespeare'],
];

$answers = [];

echo "Module 2 Quiz\n";

foreach ($questions as $index => $question) {
    echo ($index + 1) . ". " . $question['question'] . "\n";
    $answers[$index] = readline("Your answer: ");
    echo "\n";
}

$score = evaluateQuiz($questions, $answers);
$totalQuestions = count($questions);

echo "You scored $score out of $totalQuestions.\n";

if ($score === $totalQuestions) {
    echo "Excellent job!\n";
} elseif ($score > $totalQuestions / 2) {
    echo "Good effort!\n";
} else {
    echo "Better luck next time!\n";
}
