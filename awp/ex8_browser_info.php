<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex 8: Identify Web Browser</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="nav-links"><a href="index.php">Back to Dashboard</a></div>
        <h2>Identify Web Browser</h2>
        
        <?php
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "Unknown";
        $platform = "Unknown";

        // Simple detection logic
        if (preg_match('/linux/i', $agent)) {
            $platform = 'Linux';
        } elseif (preg_match('/macintosh|mac os x/i', $agent)) {
            $platform = 'Mac';
        } elseif (preg_match('/windows|win32/i', $agent)) {
            $platform = 'Windows';
        }

        if(preg_match('/MSIE/i',$agent) && !preg_match('/Opera/i',$agent)) {
            $browser = 'Internet Explorer';
        } elseif(preg_match('/Firefox/i',$agent)) {
            $browser = 'Mozilla Firefox';
        } elseif(preg_match('/Chrome/i',$agent)) {
            $browser = 'Google Chrome';
        } elseif(preg_match('/Safari/i',$agent)) {
            $browser = 'Apple Safari';
        } elseif(preg_match('/Opera/i',$agent)) {
            $browser = 'Opera';
        } elseif(preg_match('/Netscape/i',$agent)) {
            $browser = 'Netscape';
        }
        ?>

        <div class="result-box">
            <h3>User Agent Information</h3>
            <p><strong>Your User Agent String:</strong><br> <?php echo $agent; ?></p>
            <hr>
            <h3>Detected Information</h3>
            <p><strong>Operating System:</strong> <?php echo $platform; ?></p>
            <p><strong>Web Browser:</strong> <?php echo $browser; ?></p>
        </div>
    </div>
</body>
</html>
