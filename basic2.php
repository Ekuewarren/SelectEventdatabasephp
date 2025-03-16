

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>

<?php
// 1. variable myname
$yourName = "Messan, Blabuh";

// 2. Display assignment name in h1 element
echo "<h1>PHP Basics!</h1>";

// 3. Display HTML directly
echo "<h2>$yourName</h2>";

// 4. create 2 numbers and show their addition
$number1 = 1;
$number2 = 2;
$total = $number1 + $number2;

// 5. Display value of variables
echo "<p>Number 1: $number1</p>";
echo "<p>Number 2: $number2</p>";
echo "<p>Total: $total</p>";

// Step 1: Create a PHP array
$app = array('PHP', 'HTML', 'JavaScript');

// Step 2: Iterate over the PHP array to generate a JavaScript array
echo "<script>";
echo "var javaarray = [";

// Loop through the PHP array and output JavaScript array values
foreach ($app as $index => $javaarray) {
    echo "'$javaarray'";
    if ($index < count($app) - 1) {
        echo ", ";  
    }
}

echo "];";

  // JavaScript function to display array
echo "
window.onload = function() {
    var output = 'javaarray: <br>';
    for (var i = 0; i < javaarray.length; i++) {
        output += javaarray[i] + '<br>';
    }
    // use div element to display page
    var div = document.createElement('div');
    div.innerHTML = output;
    document.body.appendChild(div);  // Append the content to the body
};
</script>";

  // 6. push page to index file
  

echo '<p><a href="http://localhost/wdv341/homework.php">Go back to Homework Page</a></p>';



?>


</body>
</html>
