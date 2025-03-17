

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
	echo"<p>Selection of One Event in the table</p>";

    // Insert a new record (example)
    //$sql = "INSERT INTO wdv341_events (events_name, events_description, events_date,events_time,events_date_inserted,events_date_updated)
    //        VALUES ('Election', 'Revolution','2025-2-28','19:30:47','2025-10-15','2025-15-03')";
    //$conn->exec($sql);
    //$last_id = $conn->lastInsertId();
    //echo "New record created successfully.<br>";
   // echo "Last inserted ID is: " . $last_id . "<br>";

    //  SELECT statement to fetch a row by its ID
     $id = 2;
     $sql = "SELECT * FROM wdv341_events WHERE events_id = :id";
    
     // Prepare the query make connection
    $stmt = $conn->prepare($sql);
    
    // Bind the parameter to the query
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    // Execute the query
     $stmt->execute();

    // Fetch the result as an associative array
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a row was found
    if ($row) {
        // Start the table
        echo "<table border='1'>
                <tr>
                    <th>events_id</th>
                    <th>events_name</th>
                    <th>events_description</th>
                    <th>events_date</th>
                    <th>events_time</th>
                    <th>events_date_inserted</th>
                    <th>events_date_updated</th>
                </tr>";
        
        // Output the data in a table row
        echo "<tr>
                <td>" . $row['events_id'] . "</td>
                <td>" . $row['events_name'] . "</td>
                <td>" . $row['events_description'] . "</td>
                <td>" . $row['events_date'] . "</td>
                <td>" . $row['events_time'] . "</td>
                <td>" . $row['events_date_inserted'] . "</td>
                <td>" . $row['events_date_updated'] . "</td>
              </tr>";
        
        // End the table
        echo "</table>";
    } else {
        echo "No record found for ID: " . $id;
    }
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
finally {
    // Close the connection in the finally block
    $conn = null;
}
?>
