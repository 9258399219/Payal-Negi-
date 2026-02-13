<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 6: Railway Ticket Reservation</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .error { color: red; font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-links"><a href="index.php">Back to Dashboard</a></div>
        <h2>Railway Ticket Reservation</h2>
        
        <?php
        $nameErr = $ageErr = $sourceErr = $destErr = $dateErr = "";
        $name = $age = $source = $dest = $date = "";
        $isValid = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
                $isValid = false;
            } else {
                $name = htmlspecialchars($_POST["name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameErr = "Only letters and white space allowed";
                    $isValid = false;
                }
            }
            
            if (empty($_POST["age"])) {
                $ageErr = "Age is required";
                $isValid = false;
            } else {
                $age = $_POST["age"];
                if ($age < 5 || $age > 100) {
                    $ageErr = "Age must be between 5 and 100";
                    $isValid = false;
                }
            }
            
            if (empty($_POST["source"])) {
                $sourceErr = "Source is required";
                $isValid = false;
            } else {
                $source = htmlspecialchars($_POST["source"]);
            }

            if (empty($_POST["dest"])) {
                $destErr = "Destination is required";
                $isValid = false;
            } else {
                $dest = htmlspecialchars($_POST["dest"]);
                if (strtolower($source) == strtolower($dest)) {
                     $destErr = "Source and Destination cannot be same";
                     $isValid = false;
                }
            }

            if (empty($_POST["date"])) {
                $dateErr = "Date is required";
                $isValid = false;
            } else {
                $date = $_POST["date"];
                if ($date < date("Y-m-d")) {
                    $dateErr = "Date cannot be in the past";
                    $isValid = false;
                }
            }
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label>Passenger Name:</label>
                <input type="text" name="name" value="<?php echo $name;?>">
                <span class="error">* <?php echo $nameErr;?></span>
            </div>
            <div class="form-group">
                <label>Age:</label>
                <input type="number" name="age" value="<?php echo $age;?>">
                <span class="error">* <?php echo $ageErr;?></span>
            </div>
            <div class="form-group">
                <label>Source Station:</label>
                <input type="text" name="source" value="<?php echo $source;?>">
                <span class="error">* <?php echo $sourceErr;?></span>
            </div>
            <div class="form-group">
                <label>Destination Station:</label>
                <input type="text" name="dest" value="<?php echo $dest;?>">
                <span class="error">* <?php echo $destErr;?></span>
            </div>
            <div class="form-group">
                <label>Date of Journey:</label>
                <input type="date" name="date" value="<?php echo $date;?>">
                <span class="error">* <?php echo $dateErr;?></span>
            </div>
            <button type="submit">Book Ticket</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid) {
            echo "<div class='result-box'>";
            echo "<h3>Ticket Booked Successfully!</h3>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Age:</strong> $age</p>";
            echo "<p><strong>Route:</strong> $source to $dest</p>";
            echo "<p><strong>Date:</strong> $date</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
