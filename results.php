<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
// Fallback questions to ensure display (hardcoded for reliability)
$questions = [
    [
        'id' => 1,
        'question_text' => 'When you feel overwhelmed by emotions at work, what do you do?',
        'options' => [
            ['id' => 1, 'text' => 'Ignore it and push through.'],
            ['id' => 2, 'text' => 'Lash out or blame others.'],
            ['id' => 3, 'text' => 'Take a break and reflect.'],
            ['id' => 4, 'text' => 'Discuss with a trusted person.']
        ]
    ],
    [
        'id' => 2,
        'question_text' => 'How often do you recognize your own emotional triggers?',
        'options' => [
            ['id' => 5, 'text' => 'Rarely, I react without thinking.'],
            ['id' => 6, 'text' => 'Sometimes, but not consistently.'],
            ['id' => 7, 'text' => 'Often, I journal or reflect.'],
            ['id' => 8, 'text' => 'Always, I\'m very self-aware.']
        ]
    ],
    [
        'id' => 3,
        'question_text' => 'In a conflict with a friend, how do you respond?',
        'options' => [
            ['id' => 9, 'text' => 'Avoid the issue entirely.'],
            ['id' => 10, 'text' => 'Argue to prove I\'m right.'],
            ['id' => 11, 'text' => 'Listen and find common ground.'],
            ['id' => 12, 'text' => 'Empathize and collaborate on a solution.']
        ]
    ],
    [
        'id' => 4,
        'question_text' => 'How well can you sense when someone is upset without them saying it?',
        'options' => [
            ['id' => 13, 'text' => 'Not at all, I miss cues.'],
            ['id' => 14, 'text' => 'Occasionally notice.'],
            ['id' => 15, 'text' => 'Usually pick up on body language.'],
            ['id' => 16, 'text' => 'Highly intuitive about emotions.']
        ]
    ],
    [
        'id' => 5,
        'question_text' => 'When receiving criticism, how do you handle it?',
        'options' => [
            ['id' => 17, 'text' => 'Get defensive and argue.'],
            ['id' => 18, 'text' => 'Ignore it.'],
            ['id' => 19, 'text' => 'Reflect on it later.'],
            ['id' => 20, 'text' => 'Thank them and learn from it.']
        ]
    ],
    [
        'id' => 6,
        'question_text' => 'How do you motivate yourself during tough times?',
        'options' => [
            ['id' => 21, 'text' => 'Give up easily.'],
            ['id' => 22, 'text' => 'Push harder without rest.'],
            ['id' => 23, 'text' => 'Set small goals.'],
            ['id' => 24, 'text' => 'Seek inspiration and persist mindfully.']
        ]
    ],
    [
        'id' => 7,
        'question_text' => 'In team settings, how do you build rapport with others?',
        'options' => [
            ['id' => 25, 'text' => 'Keep to myself.'],
            ['id' => 26, 'text' => 'Talk only about work.'],
            ['id' => 27, 'text' => 'Share interests.'],
            ['id' => 28, 'text' => 'Actively listen and show empathy.']
        ]
    ],
    [
        'id' => 8,
        'question_text' => 'How empathetic are you towards colleagues\' struggles?',
        'options' => [
            ['id' => 29, 'text' => 'Dismiss them as weak.'],
            ['id' => 30, 'text' => 'Acknowledge but don\'t help.'],
            ['id' => 31, 'text' => 'Offer support occasionally.'],
            ['id' => 32, 'text' => 'Always provide emotional support.']
        ]
    ],
    [
        'id' => 9,
        'question_text' => 'Do you adapt your communication style based on others\' emotions?',
        'options' => [
            ['id' => 33, 'text' => 'No, I stick to my style.'],
            ['id' => 34, 'text' => 'Sometimes adjust.'],
            ['id' => 35, 'text' => 'Often tailor my approach.'],
            ['id' => 36, 'text' => 'Always adapt to emotional context.']
        ]
    ],
    [
        'id' => 10,
        'question_text' => 'How do you regulate stress in high-pressure situations?',
        'options' => [
            ['id' => 37, 'text' => 'Panic or freeze.'],
            ['id' => 38, 'text' => 'Suppress it.'],
            ['id' => 39, 'text' => 'Breathe and prioritize.'],
            ['id' => 40, 'text' => 'Use techniques like mindfulness.']
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQ Quiz</title>
    <style>
        /* Stunning Burgundy-themed CSS, professional and engaging. */
        body { font-family: 'Arial', sans-serif; background-color: #f8f8f8; color: #333; margin: 0; padding: 0; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; background: white; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px; }
        h2 { color: #800020; /* Burgundy */ }
        form { display: flex; flex-direction: column; }
        .question { margin-bottom: 30px; border-bottom: 1px solid #ddd; padding-bottom: 20px; }
        label { display: block; margin: 10px 0; cursor: pointer; }
        input[type="radio"] { margin-right: 10px; }
        button { background-color: #800020; color: white; border: none; padding: 15px; font-size: 1.1em; cursor: pointer; border-radius: 5px; transition: background 0.3s; margin-top: 20px; }
        button:hover { background-color: #660018; }
        .error { color: red; font-weight: bold; margin-bottom: 20px; }
        /* Responsive */
        @media (max-width: 600px) { .container { padding: 10px; } button { width: 100%; } }
    </style>
</head>
<body>
    <div class="container">
        <h2>EQ Quiz: Answer the following questions</h2>
        <?php
        // Check for any PHP execution issues
        if (!isset($questions) || empty($questions)) {
            echo '<p class="error">Error: Questions array not set. Please contact support.</p>';
        } else {
            // Display questions
            foreach ($questions as $question) {
                echo '<div class="question"><p>' . htmlspecialchars($question['question_text']) . '</p>';
                foreach ($question['options'] as $option) {
                    echo '<label><input type="radio" name="answer[' . $question['id'] . ']" value="' . $option['id'] . '" required> ' . htmlspecialchars($option['text']) . '</label>';
                }
                echo '</div>';
            }
        }
        ?>
        <form action="results.php" method="POST">
            <?php
            // Re-display questions in form for submission
            foreach ($questions as $question) {
                echo '<div class="question"><p>' . htmlspecialchars($question['question_text']) . '</p>';
                foreach ($question['options'] as $option) {
                    echo '<label><input type="radio" name="answer[' . $question['id'] . ']" value="' . $option['id'] . '" required> ' . htmlspecialchars($option['text']) . '</label>';
                }
                echo '</div>';
            }
            ?>
            <button type="submit">Submit and See Results</button>
        </form>
    </div>
    <script>
        // Inline JS for basic navigation feel and validation
        console.log('Questions loaded via hardcoded fallback.');
        document.querySelector('form').addEventListener('submit', function(e) {
            let answered = document.querySelectorAll('input[type="radio"]:checked').length;
            let totalQuestions = <?php echo count($questions); ?>;
            if (answered < totalQuestions) {
                e.preventDefault();
                alert('Please answer all questions before submitting.');
            }
        });
    </script>
</body>
</html>
<?php
// No database connection included for now to isolate the issue
?>
