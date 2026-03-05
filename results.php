<?php
include 'db.php';

// Calculate score
$total_score = 0;
$max_score = 50; // 10 questions * 5 max points

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'q') === 0) {
            $total_score += intval($value);
        }
    }
}

// Determine feedback
$feedback = "";
$bg_class = "";

if ($total_score >= 40) {
    $feedback = "Outstanding! You possess exceptional emotional intelligence. You are highly self-aware, manage emotions well, and handle relationships with empathy and skill.";
    $level = "High EQ";
    $color = "#00BFA6"; // Teal
} elseif ($total_score >= 25) {
    $feedback = "Good Job! You have a solid foundation of emotional intelligence. You generally handle emotions well but may have specific areas where you can improve self-regulation or empathy.";
    $level = "Average EQ";
    $color = "#FFC107"; // Amber
} else {
    $feedback = "Room for Growth. Your score indicates you might struggle with understanding or managing emotions. Don't worry—EQ is a skill that can be developed with practice!";
    $level = "Developing EQ";
    $color = "#FF6B6B"; // Red
}

// Save result to database
$stmt = $conn->prepare("INSERT INTO results (total_score, feedback) VALUES (?, ?)");
$stmt->bind_param("is", $total_score, $feedback);
$stmt->execute();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your EQ Results</title>
    <style>
        :root {
            --primary: #6C63FF;
            --secondary: #3F3D56;
            --bg: #F0F2F5;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg);
            color: var(--secondary);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
            text-align: center;
        }

        .result-card {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 100%;
            animation: slideUp 0.8s ease-out;
        }

        .score-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: conic-gradient(<?php echo $color; ?> <?php echo ($total_score/$max_score)*100; ?>%, #eee 0);
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .score-circle::before {
            content: '';
            position: absolute;
            width: 130px;
            height: 130px;
            background: white;
            border-radius: 50%;
        }

        .score-text {
            position: relative;
            z-index: 1;
            font-size: 2.5rem;
            font-weight: bold;
            color: <?php echo $color; ?>;
        }

        h1 {
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }

        h2 {
            color: <?php echo $color; ?>;
            margin-bottom: 1.5rem;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s;
            margin: 0.5rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            background-color: #5a52d5;
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="result-card">
        <h1>Assessment Complete</h1>
        <h2><?php echo $level; ?></h2>
        
        <div class="score-circle">
            <span class="score-text"><?php echo $total_score; ?>/<?php echo $max_score; ?></span>
        </div>

        <p><?php echo $feedback; ?></p>
        
        <a href="quiz.php" class="btn">Retake Test</a>
        <a href="index.php" class="btn btn-outline">Back Home</a>
    </div>

</body>
</html>
