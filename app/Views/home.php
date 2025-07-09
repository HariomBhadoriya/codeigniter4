<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnEasy - Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        
        }
        .hero {
            text-align: center;
            padding: 4rem 2rem;
            background-color: #ecf0f1;
        }
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #2c3e50;
        }
        .hero p {
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-bottom: 2rem;
        }
        .hero button {
            padding: 0.8rem 2rem;
            font-size: 1rem;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .hero button:hover {
            background-color: #2980b9;
        }
        .courses {
            padding: 2rem;
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }
        .course-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 300px;
            padding: 1rem;
            text-align: center;
        }
        .course-card h3 {
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }
        .course-card p {
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
    
   
    <section class="hero">
        <h1>Unlock Your Potential with LearnEasy</h1>
        <p>Explore a wide range of courses designed to help you succeed in your educational journey.</p>
        <button>Explore Courses</button>
    </section>
    <section class="courses">
        <div class="course-card">
            <h3>Introduction to Python</h3>
            <p>Learn the basics of Python programming with hands-on projects.</p>
        </div>
        <div class="course-card">
            <h3>Mathematics for Beginners</h3>
            <p>Master foundational math concepts with interactive lessons.</p>
        </div>
        <div class="course-card">
            <h3>Web Development 101</h3>
            <p>Build your first website with HTML, CSS, and JavaScript.</p>
        </div>
    </section>
    <footer>
        <p>&copy; 2025 LearnEasy. All rights reserved.</p>
    </footer>
</body>
</html>
<?= $this->endSection() ?> 