<?php

// Get the form data
$crime_type = $_POST['crime_type'];
$crime_location = $_POST['crime_location'];
$crime_date = $_POST['crime_date'];
$crime_time = $_POST['crime_time'];
$crime_description = $_POST['crime_description'];

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projdb";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert the data into the "crimes" table
$sql = "INSERT INTO crimes (type, location, date, time, description)
        VALUES ('$crime_type', '$crime_location', '$crime_date', '$crime_time', '$crime_description')";

if (mysqli_query($conn, $sql)) {
  echo "Crime report submitted successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
