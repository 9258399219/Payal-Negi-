<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 2: EB Bill Calculation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-links"><a href="index.php">Back to Dashboard</a></div>
        <h2>Electricity Bill Calculation</h2>
        
        <form method="post">
            <div class="form-group">
                <label>Enter Units Consumed:</label>
                <input type="number" name="units" required min="0">
            </div>
            <button type="submit" name="calculate">Calculate Bill</button>
        </form>

        <?php
        if(isset($_POST['calculate'])){
            $units = $_POST['units'];
            $bill = 0;
            
            // Logic: 
            // First 100 units: Rs. 3/unit
            // Next 100 units (101-200): Rs. 4/unit
            // Above 200 units: Rs. 5/unit
            // Fixed charge: Rs. 50
            
            if($units <= 100) {
                $bill = $units * 3;
            } elseif($units <= 200) {
                $bill = (100 * 3) + (($units - 100) * 4);
            } else {
                $bill = (100 * 3) + (100 * 4) + (($units - 200) * 5);
            }
            
            $total_bill = $bill + 50; // Adding fixed charge

            echo "<div class='result-box'>";
            echo "<h3>Bill Details</h3>";
            echo "<p>Units Consumed: <strong>$units</strong></p>";
            echo "<p>Usage Charge: Rs. $bill</p>";
            echo "<p>Fixed Charge: Rs. 50</p>";
            echo "<h4>Total Bill Amount: Rs. $total_bill</h4>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
