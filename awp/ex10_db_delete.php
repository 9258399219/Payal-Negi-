<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 10: Database Delete</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-links">
            <a href="index.php">Dashboard</a>
            <a href="ex9_db_insert.php">Add New Student</a>
        </div>
        <h2>Database: Delete Student</h2>

        <?php
        require_once 'db_connect.php';

        // Handle Delete
        if(isset($_POST['delete_id'])){
            try {
                $sql = "DELETE FROM students WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $_POST['delete_id']);
                $stmt->execute();
                echo "<div class='result-box'>Record deleted successfully!</div>";
            } catch(PDOException $e) {
                echo "<div class='error-box'>Error deleting: " . $e->getMessage() . "</div>";
            }
        }

        // List Students
        try {
            $stmt = $pdo->query("SELECT * FROM students");
            $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($students) > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Roll No</th><th>Course</th><th>Action</th></tr>";
                foreach($students as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['roll_no'] . "</td>";
                    echo "<td>" . $row['course'] . "</td>";
                    echo "<td>
                            <form method='post' style='margin:0;' onsubmit='return confirm(\"Are you sure?\");'>
                                <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                                <button type='submit' style='background-color: #dc3545; padding: 5px 10px; font-size: 14px;'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No students found. <a href='ex9_db_insert.php'>Add some</a>.</p>";
            }
        } catch(PDOException $e) {
            echo "<div class='error-box'>Error fetching data: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
</body>
</html>
