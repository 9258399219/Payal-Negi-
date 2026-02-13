<?php
// Read input from console
echo "Enter a character: ";
$ch = trim(fgets(STDIN));

// Take only the first character
$ch = $ch[0];

if ($ch >= 'A' && $ch <= 'Z') {
    echo "The character is Uppercase\n";
}
elseif ($ch >= 'a' && $ch <= 'z') {
    echo "The character is Lowercase\n";
}
else {
    echo "The character is not an alphabet\n";
}
?>
