<?php
include "connection.php";
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = isset($_POST['Name']) ? $_POST['Name'] : '';
    $PhoneNumber = isset($_POST['PhoneNumber']) ? $_POST['PhoneNumber'] : '';
    // Insert data into the database
    $sql = "INSERT INTO calling_back (Name, PhoneNumber) VALUES ('$Name', '$PhoneNumber')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation saved successfully!";
        header("Location: home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Close the connection
$conn->close();
?>