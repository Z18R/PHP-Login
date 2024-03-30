<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to your database
    $serverName = "DESKTOP-6E9LU1F\SQLEXPRESS"; // Server name
    $connectionOptions = array(
        "Database" => "CentralAccess", // Database name
        "Uid" => "sa",                 // Username
        "PWD" => "18Bz23efBd0J"       // Password
    );

//     $conn = sqlsrv_connect($serverName, $connectionOptions);

//     if ($conn === false) {
//         die("Connection failed: " . print_r(sqlsrv_errors(), true));
//     }
    
//     // Prepare and execute SQL query
//     $sql = "SELECT * FROM users WHERE username = ?";
//     $params = array($username);
//     $stmt = sqlsrv_query($conn, $sql, $params);

//     if ($stmt === true) {
//         die("Query failed: " . print_r(sqlsrv_errors(), true));
//     }

//   // Check if a row was returned
//   if (sqlsrv_has_rows($stmt)) {
//     // Fetch the row
//     $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
//     // Verify password
//     if (isset($row['password']) && password_verify($password, $row['password'])) {
//         // Password is correct, set session variables and redirect
//         $_SESSION["loggedin"] = true;
//         $_SESSION["username"] = $username;
//         header("Location: ../login.php");
//         exit;
//     } else {
//         // Invalid username/email or password
//         echo "Invalid username/email or password.";
//     }
// } else {
//     // User not found
//     echo "User not found.";
// }

// // Close connection
// sqlsrv_free_stmt($stmt);
// sqlsrv_close($conn);
// }
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true));
} else {
    echo "Connected successfully.<br>";
}}

// Prepare SQL query to retrieve user data based on username
$sql = "SELECT * FROM users WHERE username = ?";
$params = array($username);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die("Query failed: " . print_r(sqlsrv_errors(), true));
}

// Check if a row was returned
if (sqlsrv_has_rows($stmt)) {
    // Fetch the row
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    echo "<pre>";
    print_r($row);
    echo "</pre>";
    // Rest of the code...
    // Directly access username and password from the fetched row
    $username = $row['Username'];
    $password = $row['Password'];
    
    // Redirect to another page using header function
    header("Location: ../login.php");
    exit; // Ensure script execution stops after redirect
} else {
    // No rows returned, handle accordingly
    echo "User not found.";
}

echo "SQL Query: " . $sql . "<br>";

