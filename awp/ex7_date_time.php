<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 7: Date and Time Operations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-links"><a href="index.php">Back to Dashboard</a></div>
        <h2>Date and Time Operations in PHP</h2>
        
        <div class="result-box">
            <h3>Current Date & Time:</h3>
            <p><strong>Default Format (Y-m-d H:i:s):</strong> <?php echo date("Y-m-d H:i:s"); ?></p>
            <p><strong>Day of Week:</strong> <?php echo date("l"); ?></p>
            <p><strong>Day of Year:</strong> <?php echo date("z"); ?></p>
            <p><strong>Time Zone:</strong> <?php echo date_default_timezone_get(); ?></p>
        </div>

        <hr>
        
        <h3>Date Difference Calculator</h3>
        <form method="post">
            <div class="form-group">
                <label>Date 1:</label>
                <input type="date" name="date1" required>
            </div>
            <div class="form-group">
                <label>Date 2:</label>
                <input type="date" name="date2" required>
            </div>
            <button type="submit" name="calc_diff">Calculate Difference</button>
        </form>

        <?php
        if(isset($_POST['calc_diff'])){
            $d1 = new DateTime($_POST['date1']);
            $d2 = new DateTime($_POST['date2']);
            $interval = $d1->diff($d2);
            
            echo "<div class='result-box'>";
            echo "<h3>Difference:</h3>";
            echo "<p>" . $interval->y . " years, " . $interval->m . " months, " . $interval->d . " days</p>";
            echo "<p>Total days: " . $interval->days . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
