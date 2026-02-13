<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 3: Student Grade Manipulation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-links"><a href="index.php">Back to Dashboard</a></div>
        <h2>Student Grade Calculation</h2>
        
        <form method="post">
            <div class="form-group">
                <label>Mark 1:</label>
                <input type="number" name="m1" required min="0" max="100">
            </div>
            <div class="form-group">
                <label>Mark 2:</label>
                <input type="number" name="m2" required min="0" max="100">
            </div>
            <div class="form-group">
                <label>Mark 3:</label>
                <input type="number" name="m3" required min="0" max="100">
            </div>
            <div class="form-group">
                <label>Mark 4:</label>
                <input type="number" name="m4" required min="0" max="100">
            </div>
            <button type="submit" name="calc_grade">Calculate Grade</button>
        </form>

        <?php
        if(isset($_POST['calc_grade'])){
            $m1 = $_POST['m1'];
            $m2 = $_POST['m2'];
            $m3 = $_POST['m3'];
            $m4 = $_POST['m4'];
            
            $total = $m1 + $m2 + $m3 + $m4;
            $avg = $total / 4;
            $grade = "";

            if($m1 < 40 || $m2 < 40 || $m3 < 40 || $m4 < 40) {
                $grade = "Fail";
            } elseif($avg >= 90) {
                $grade = "A";
            } elseif($avg >= 80) {
                $grade = "B";
            } elseif($avg >= 70) {
                $grade = "C";
            } elseif($avg >= 60) {
                $grade = "D";
            } else {
                $grade = "E";
            }

            echo "<div class='result-box'>";
            echo "<h3>Grade Result</h3>";
            echo "<p>Total Marks: <strong>$total / 400</strong></p>";
            echo "<p>Average: <strong>$avg</strong></p>";
            echo "<p>Grade: <strong>$grade</strong></p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
