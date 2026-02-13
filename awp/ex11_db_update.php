<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 11: Database Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-links">
            <a href="index.php">Dashboard</a>
            <a href="ex9_db_insert.php">Add New Student</a>
        </div>
        <h2>Database: Update Student</h2>

        <?php
        require_once 'db_connect.php';

        // 2. Handle Update Submission
        if(isset($_POST['update_record'])){
            try {
                $sql = "UPDATE students SET name=:name, roll_no=:roll_no, course=:course, email=:email WHERE id=:id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':name' => $_POST['name'],
                    ':roll_no' => $_POST['roll_no'],
                    ':course' => $_POST['course'],
                    ':email' => $_POST['email'],
                    ':id' => $_POST['id']
                ]);
                echo "<div class='result-box'>Record updated successfully!</div>";
            } catch(PDOException $e) {
                echo "<div class='error-box'>Error updating: " . $e->getMessage() . "</div>";
            }
        }

        // 1. Show Edit Form if requested
        if(isset($_GET['edit_id'])){
            $edit_id = $_GET['edit_id'];
            $stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
            $stmt->execute([':id' => $edit_id]);
            $student = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($student):
        ?>
            <div class="result-box" style="background-color: #e3f2fd; border-color: #90caf9;">
                <h3>Edit Record</h3>
                <form method="post" action="ex11_db_update.php" style="margin-top:0;">
                    <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" value="<?php echo $student['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Roll No:</label>
                        <input type="text" name="roll_no" value="<?php echo $student['roll_no']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Course:</label>
                        <input type="text" name="course" value="<?php echo $student['course']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
                    </div>
                    <button type="submit" name="update_record">Update Student</button>
                    <a href="ex11_db_update.php" style="margin-left: 10px;">Cancel</a>
                </form>
            </div>
            <hr>
        <?php 
            endif;
        }

        // 3. List Students
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
                    echo "<td><a href='ex11_db_update.php?edit_id=" . $row['id'] . "' style='color: #007bff; font-weight: bold;'>Edit</a></td>";
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
