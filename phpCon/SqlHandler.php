<?php
$serverName = "DESKTOP-6E9LU1F\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"Book", "UID"=>"sa", "PWD"=>"18Bz23efBd0J");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

try {
    if ($conn) {
        echo "Connection established.<br />";
    } else {
        throw new Exception("Connection could not be established.<br />");
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die(print_r(sqlsrv_errors(), true));
}
?>

