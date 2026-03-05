<?php
include 'db.php';

// Fetch questions
$sql = "SELECT * FROM questions";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take the EQ Test</title>
    <style>
        :root {
            --primary: #6C63FF;
            --secondary: #3F3D56;
            --bg: #F0F2F5;
            --card-bg: #FFFFFF;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg);
            color: var(--secondary);
            display: flex;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }

        form {
            background: var(--card-bg);
            max-width: 800px;
            width: 100%;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary);
        }

        .question-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: transform 0.2s;
        }
        
        .question-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .question-text {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: block;
        }

        .options {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }

        .option-label {
            flex: 1;
            text-align: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s;
            min-width: 80px;
        }

        .option-label:hover {
            background: #eef0f3;
        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"]:checked + span {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            display: block;
            border-radius: 6px;
            padding: 10px;
        }
        
        /* Make the label act as the container for styling based on checked state */
        label {
            flex: 1;
        }
        
        label span {
            display: block;
            width: 100%;
            height: 100%;
            padding: 10px;
            border-radius: 8px;
        }

        .submit-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 50px;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background-color: #5a52d5;
        }

        .progress {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            color: #888;
        }

    </style>
</head>
<body>

    <form action="results.php" method="POST">
        <h2>Emotional Intelligence Assessment</h2>
        <div class="progress">Answer honestly for accurate results.</div>

        <?php
        if ($result->num_rows > 0) {
            $q_num = 1;
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="question-card">
                    <span class="question-text"><?php echo $q_num . ". " . $row["question_text"]; ?></span>
                    <div class="options">
                        <!-- Standard Likert Scale Options -->
                         <!-- We hardcode values 1-5 for simplicity as they are standard across all questions in our DB design -->
                        <label>
                            <input type="radio" name="q<?php echo $row['id']; ?>" value="1" required>
                            <span>Never</span>
                        </label>
                        <label>
                            <input type="radio" name="q<?php echo $row['id']; ?>" value="2">
                            <span>Rarely</span>
                        </label>
                        <label>
                            <input type="radio" name="q<?php echo $row['id']; ?>" value="3">
                            <span>Sometimes</span>
                        </label>
                        <label>
                            <input type="radio" name="q<?php echo $row['id']; ?>" value="4">
                            <span>Often</span>
                        </label>
                        <label>
                            <input type="radio" name="q<?php echo $row['id']; ?>" value="5">
                            <span>Always</span>
                        </label>
                    </div>
                </div>
                <?php
                $q_num++;
            }
        } else {
            echo "No questions found.";
        }
        ?>

        <button type="submit" class="submit-btn">Get My Results</button>
    </form>
    
    <script>
        // Simple client-side validation could go here, but 'required' attribute handles most of it.
        document.querySelector('form').addEventListener('submit', function(e) {
            // Optional: Add excitement loader
        });
    </script>

</body>
</html>
