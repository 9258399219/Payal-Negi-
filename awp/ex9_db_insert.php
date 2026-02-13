<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 9: Database Insert</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-links">
            <a href="index.php">Dashboard</a>
            <a href="ex10_db_delete.php">Go to Delete</a>
            <a href="ex11_db_update.php">Go to Update</a>
        </div>
        <h2>Database: Insert Student</h2>
        
        <form method="post">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Roll No:</label>
                <input type="text" name="roll_no" required>
            </div>
            <div class="form-group">
                <label>Course:</label>
                <input type="text" name="course" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <button type="submit" name="insert">Add Student</button>
        </form>

        <?php
        require_once 'db_connect.php';

        if(isset($_POST['insert'])){
            try {
                $sql = "INSERT INTO students (name, roll_no, course, email) VALUES (:name, :roll_no, :course, :email)";
                $stmt = $pdo->prepare($sql);
                
                $stmt->bindParam(':name', $_POST['name']);
                $stmt->bindParam(':roll_no', $_POST['roll_no']);
                $stmt->bindParam(':course', $_POST['course']);
                $stmt->bindParam(':email', $_POST['email']);
                
                $stmt->execute();
                
                echo "<div class='result-box'>New student record created successfully!</div>";
            } catch(PDOException $e) {
                echo "<div class='error-box'>Error: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
