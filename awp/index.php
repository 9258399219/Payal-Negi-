<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Exercises Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .exercise-list {
            list-style: none;
            padding: 0;
        }
        .exercise-list li {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 15px;
            transition: background 0.3s;
        }
        .exercise-list li:hover {
            background-color: #f9f9f9;
        }
        .exercise-list a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            display: block;
        }
        .exercise-tag {
            background-color: #007bff;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Programming Exercises</h1>
        <p>Select an exercise to view the demonstration:</p>
        
        <ul class="exercise-list">
            <li><a href="ex1_student_reg.php"><span class="exercise-tag">Ex 1</span> Student Registration Form</a></li>
            <li><a href="ex2_eb_bill.php"><span class="exercise-tag">Ex 2</span> EB Bill Calculation</a></li>
            <li><a href="ex3_student_grade.php"><span class="exercise-tag">Ex 3</span> Student Grade Manipulation</a></li>
            <li><a href="ex4_string_ops.php"><span class="exercise-tag">Ex 4</span> String Operations in PHP</a></li>
            <li><a href="ex5_book_master.php"><span class="exercise-tag">Ex 5</span> Book Master Form</a></li>
            <li><a href="ex6_railway_form.php"><span class="exercise-tag">Ex 6</span> Form Validation – Railway Ticket</a></li>
            <li><a href="ex7_date_time.php"><span class="exercise-tag">Ex 7</span> Date and Time Operations</a></li>
            <li><a href="ex8_browser_info.php"><span class="exercise-tag">Ex 8</span> Identify Web Browser</a></li>
            <li><a href="ex9_db_insert.php"><span class="exercise-tag">Ex 9</span> Database – Insert Operation</a></li>
            <li><a href="ex10_db_delete.php"><span class="exercise-tag">Ex 10</span> Database – Delete Operation</a></li>
            <li><a href="ex11_db_update.php"><span class="exercise-tag">Ex 11</span> Database – Update Operation</a></li>
        </ul>
    </div>
</body>
</html>
