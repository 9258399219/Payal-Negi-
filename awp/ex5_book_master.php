<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 5: Book Master Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-links"><a href="index.php">Back to Dashboard</a></div>
        <h2>Book Master Form</h2>
        
        <form method="post">
            <div class="form-group">
                <label>Book Title:</label>
                <input type="text" name="title" required>
            </div>
            <div class="form-group">
                <label>Author Name:</label>
                <input type="text" name="author" required>
            </div>
            <div class="form-group">
                <label>Publisher:</label>
                <input type="text" name="publisher" required>
            </div>
            <div class="form-group">
                <label>Price ($):</label>
                <input type="number" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label>Quantity:</label>
                <input type="number" name="qty" required>
            </div>
            <button type="submit" name="submit_book">Add Book</button>
        </form>

        <?php
        if(isset($_POST['submit_book'])){
            $title = htmlspecialchars($_POST['title']);
            $author = htmlspecialchars($_POST['author']);
            $publisher = htmlspecialchars($_POST['publisher']);
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            
            $total_cost = $price * $qty;

            echo "<div class='result-box'>";
            echo "<h3>Book Added Successfully!</h3>";
            echo "<p><strong>Title:</strong> $title</p>";
            echo "<p><strong>Author:</strong> $author</p>";
            echo "<p><strong>Publisher:</strong> $publisher</p>";
            echo "<p><strong>Price:</strong> $$price</p>";
            echo "<p><strong>Quantity:</strong> $qty</p>";
            echo "<p><strong>Total Inventory Value:</strong> $$total_cost</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
