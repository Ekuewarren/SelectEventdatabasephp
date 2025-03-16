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
	
	// Manually adjust the auto-increment value if needed
    // Uncomment the next two lines if you need to adjust the auto-increment value to 5
    //$alterSql = "ALTER TABLE wdv341_events AUTO_INCREMENT = 4";
    //$conn->exec($alterSql);
	
	$sql = "INSERT INTO wdv341_events (events_name, events_description)
    VALUES ('Doe', 'johnparti')";
    // use exec() because no results are returned
   $conn->exec($sql);
   $last_id = $conn->lastInsertId();
   echo "New record created successfully."."<br>";
   echo "Last inserted ID is: " . $last_id . "<br>";
	
	
	// Prepare a SELECT statement to fetch a row by its ID
    $id = 3; // Example ID to search for
    $sql = "SELECT * FROM wdv341_events WHERE events_id = :id";
    
    // Prepare the query
    $stmt = $conn->prepare($sql);
    
    // Bind the parameter to the query
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    // Execute the query
    $stmt->execute();

    // Fetch the result as an associative array
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a row was found
    if ($row) {
        echo "Record found: <br>";
        echo "ID: " . $row['events_id'] . "<br>";
        echo "Name: " . $row['events_name'] . "<br>";
        echo "Description: " . $row['events_description'] . "<br>";
		echo "Date: " . $row['events_date'] . "<br>";
		echo "Time: " . $row['events_time'] . "<br>";
		echo "Date: " . $row['events_date_inserted'] . "<br>";
		echo "Date: " . $row['events_date_updated'] . "<br>";
    } else {
        echo "No record found for ID: " . $id;
    }
}
	
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
	
	
	finally {
    // Close the connection in the finally block
    $conn = null;
}

?>