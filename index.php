<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emotional Intelligence Test</title>
    <style>
        :root {
            --primary: #6C63FF;
            --secondary: #3F3D56;
            --accent: #00BFA6;
            --bg: #F9FAFB;
            --text: #333;
            --white: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 2rem;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            position: relative;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://source.unsplash.com/random/1920x1080/?calm,nature,water') no-repeat center center/cover;
            opacity: 0.05;
            z-index: 0;
        }

        .container {
            max-width: 800px;
            z-index: 1;
            background: rgba(255, 255, 255, 0.9);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-out;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--secondary);
            font-weight: 700;
        }

        p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            background-color: var(--primary);
            color: var(--white);
            padding: 1rem 2.5rem;
            font-size: 1.2rem;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.4);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(108, 99, 255, 0.6);
            background-color: #5a52d5;
        }

        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 3rem;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .feature {
            flex: 1;
            min-width: 200px;
        }

        .feature h3 {
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 600px) {
            h1 { font-size: 2rem; }
            .container { padding: 1.5rem; }
        }
    </style>
</head>
<body>

    <div class="hero">
        <div class="container">
            <h1>Discover Your Emotional Intelligence</h1>
            <p>Understand your emotions, build better relationships, and achieve your goals. Take our scientifically designed test to assess your EQ today.</p>
            
            <a href="quiz.php" class="btn">Start the Test</a>

            <div class="features">
                <div class="feature">
                    <h3>Self-Awareness</h3>
                    <p>Recognize your own emotions.</p>
                </div>
                <div class="feature">
                    <h3>Empathy</h3>
                    <p>Understand how others feel.</p>
                </div>
                <div class="feature">
                    <h3>Self-Control</h3>
                    <p>Manage your reactions effectively.</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
