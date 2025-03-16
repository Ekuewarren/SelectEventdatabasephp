
<?php
$serverName = "localhost";
$username = "root";
$password = "Theresaobey";
$database = "wdv341";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>Connected successfully</p>";
	
    // Select data from the table, 
    $sql = $conn->query("SELECT * FROM wdv341_events");

    // Check if any rows were returned
    if ($sql->rowCount() > 0) {
        echo $sql->rowCount() . " results found.";
        
        // Output the table header
        echo "<table><tr><th>events_id</th><th>events_name</th><th>events_description</th><th>events_date</th><th>events_time</th><th>events_date_inserted</th><th>events_date_updated</th></tr>";
        
        // Fetch each row and display it
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row["events_id"] . "</td><td>" . $row["events_name"] . "</td><td>" . $row["events_description"] . "</td><td>" . $row["events_date"] . "</td><td>" . $row["events_time"] . "</td><td>" . $row["events_date_inserted"] . "</td><td>" . $row["events_date_updated"] . "</td></tr>";
        }
        
        echo "</table>";
    } else {
        echo "0 results";
    }
	
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} finally {
    // Close the connection in the finally block
    $conn = null;
}
?>


