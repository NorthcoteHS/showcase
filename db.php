<?php
// Setup variables.
$servername = "localhost";
$username = "showcase";
$password = "showcase";
$dbname = "showcase";
$table = "students";

// Create connection.
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection.
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function query($sql) {
  // Query SQL.
  global $conn;
  $result = $conn->query($sql);

  if (!$result) {
    // Handle errors.
    die("Query failed: " . $conn->error);
  }
  else if (is_object($result)) {
    // Initialise an empty array.
    $array = [];

    // Parse the results.
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $array[] = $row;
      }
    }

    // Return the array.
    return $array;
  }

  // Return the numeric result (e.g. for INSERT/UPDATE).
  return $result;
}
?>
