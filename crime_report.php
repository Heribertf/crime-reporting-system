<?php
$crime_type = $_POST['crime_type'];
$crime_location = $_POST['crime_location'];
$crime_date = $_POST['crime_date'];
$crime_time = $_POST['crime_time'];
$crime_description = $_POST['crime_description'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

require_once "config.php";


if(isset($_FILES['crime_photo'])) {
  $crime_photo = $_FILES['crime_photo'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($crime_photo["name"]);
  
  if (move_uploaded_file($crime_photo["tmp_name"], $target_file)) {

    $sql = "INSERT INTO crimes (type, location, date, time, description, latitude, longitude, file)
            VALUES ('$crime_type', '$crime_location', '$crime_date', '$crime_time', '$crime_description', '$latitude', '$longitude', '$target_file')";
  
    if (mysqli_query($conn, $sql)) {
      echo "Crime report submitted successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    echo "Error uploading file";
  }
} else {
  // Insert the data into the "crimes" table without the photo
  $sql = "INSERT INTO crimes (type, location, date, time, description, latitude, longitude)
          VALUES ('$crime_type', '$crime_location', '$crime_date', '$crime_time', '$crime_description', '$latitude', '$longitude')";
  
  if (mysqli_query($conn, $sql)) {
    echo "Crime report submitted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
