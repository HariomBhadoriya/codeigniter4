<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnEasy - About Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
     
        .about-section {
            padding: 4rem 2rem;
            text-align: center;
            background-color: #ecf0f1;
        }
        .about-section h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #2c3e50;
        }
        .about-section p {
            font-size: 1.1rem;
            color: #7f8c8d;
            max-width: 800px;
            margin: 0 auto 1.5rem;
            line-height: 1.6;
        }
        .mission {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            padding: 2rem;
        }
        .mission-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 300px;
            padding: 1rem;
            text-align: center;
        }
        .mission-card h3 {
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }
        .mission-card p {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 1rem;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    
    <section class="about-section">
        <h1>About LearnEasy</h1>
        <p>LearnEasy is dedicated to making education accessible, engaging, and effective for learners worldwide. Our platform offers a diverse range of courses designed to empower students, professionals, and lifelong learners to achieve their goals.</p>
        <p>Founded with a passion for education, we strive to provide high-quality content, expert instructors, and a user-friendly experience to help you succeed in your learning journey.</p>
    </section>
    <section class="mission">
        <div class="mission-card">
            <h3>Our Mission</h3>
            <p>To democratize education by providing affordable and accessible learning opportunities for all.</p>
        </div>
        <div class="mission-card">
            <h3>Our Vision</h3>
            <p>To inspire a global community of learners to pursue knowledge and personal growth.</p>
        </div>
        <div class="mission-card">
            <h3>Our Values</h3>
            <p>Excellence, inclusivity, and innovation drive everything we do at LearnEasy.</p>
        </div>
    </section>
    <footer>
        <p>© 2025 LearnEasy. All rights reserved.</p>
    </footer>
</body>
</html>
</body>
</html>
<?= $this->endSection() ?> 