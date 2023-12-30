<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yarnstock";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['did'])){
    $did=$_GET['did'];

    $delquery="DELETE FROM stock WHERE id = $did";
    if ($conn->query($delquery) === TRUE) {
        echo "<script > alert('Record updated successfully')</script>";
        header("Location: view.php");

    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }


}
?>