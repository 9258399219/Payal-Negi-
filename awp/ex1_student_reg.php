<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 1: Student Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-links"><a href="index.php">Back to Dashboard</a></div>
        <h2>Student Registration Form</h2>
        
        <form method="post" action="">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Roll No:</label>
                <input type="text" name="rollno" required>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <textarea name="address" rows="3"></textarea>
            </div>
            <button type="submit" name="submit">Register</button>
            <button type="reset" style="background-color: #6c757d;">Clear</button>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $name = htmlspecialchars($_POST['name']);
            $rollno = htmlspecialchars($_POST['rollno']);
            $gender = $_POST['gender'];
            $address = htmlspecialchars($_POST['address']);
            
            echo "<div class='result-box'>";
            echo "<h3>Registration Successful!</h3>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Roll No:</strong> $rollno</p>";
            echo "<p><strong>Gender:</strong> $gender</p>";
            echo "<p><strong>Address:</strong> $address</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
