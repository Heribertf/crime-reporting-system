<?php
require_once "includes/sess.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Crime Report Form</title>

    <script type="text/javascript">
		// Check if crime date and time are in the future
		function checkDateTime() {
			var currentDate = new Date();
			var crimeDate = new Date(document.getElementById("crime_date").value);
			var crimeTime = new Date(document.getElementById("crime_time").value);
			var crimeDateTime = new Date(crimeDate.getFullYear(), crimeDate.getMonth(), crimeDate.getDate(), crimeTime.getHours(), crimeTime.getMinutes(), crimeTime.getSeconds());
			console.log(crimeDate);
            console.log(crimeTime);
            console.log(crimeDateTime);
            console.log(currentDate)
            if (crimeDate > currentDate) {
				alert("The date and time of the crime cannot be in the future.");
				return false;
			}
			return true;
		}
	</script>

    
</head>
<body>
	<h1>Crime Report Form</h1>
	<form action="crime_report.php" method="post" onsubmit="return checkDateTime();">
		<label for="crime_type">Type of Crime:</label>
		<input type="text" id="crime_type" name="crime_type" required><br><br>

		<label for="crime_location">Location of Crime:</label>
		<input type="text" id="crime_location" name="crime_location" required><br><br>

		<label for="crime_date">Date of Crime:</label>
		<input type="date" id="crime_date" name="crime_date" required><br><br>

		<label for="crime_time">Time of Crime:</label>
		<input type="time" id="crime_time" name="crime_time" required><br><br>

		<label for="crime_description">Description of Crime:</label><br>
		<textarea id="crime_description" name="crime_description" rows="4" cols="50" required></textarea><br><br>

		<input type="submit" value="Submit Report">
	</form>

</body>
</html>