<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 4: String Operations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-links"><a href="index.php">Back to Dashboard</a></div>
        <h2>String Operations in PHP</h2>
        
        <form method="post">
            <div class="form-group">
                <label>Enter a String:</label>
                <input type="text" name="string_input" required value="<?php echo isset($_POST['string_input']) ? $_POST['string_input'] : ''; ?>">
            </div>
            <button type="submit" name="perform_ops">Perform Operations</button>
        </form>

        <?php
        if(isset($_POST['perform_ops'])){
            $str = $_POST['string_input'];
            
            echo "<div class='result-box'>";
            echo "<h3>Results for '$str':</h3>";
            echo "<ul>";
            echo "<li><strong>String Length (strlen):</strong> " . strlen($str) . "</li>";
            echo "<li><strong>Word Count (str_word_count):</strong> " . str_word_count($str) . "</li>";
            echo "<li><strong>Reverse (strrev):</strong> " . strrev($str) . "</li>";
            echo "<li><strong>Uppercase (strtoupper):</strong> " . strtoupper($str) . "</li>";
            echo "<li><strong>Lowercase (strtolower):</strong> " . strtolower($str) . "</li>";
            echo "<li><strong>Title Case (ucwords):</strong> " . ucwords($str) . "</li>";
            echo "<li><strong>MD5 Hash (md5):</strong> " . md5($str) . "</li>";
            echo "<li><strong>Shuffle (str_shuffle):</strong> " . str_shuffle($str) . "</li>";
            echo "</ul>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
