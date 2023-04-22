<!DOCTYPE html>
<html>
<head>
	<title>Crime Statistics</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
	<h1>Crime Statistics</h1>

	<label for="year">Select Year:</label>
	<select id="year">
		<?php
			// Populate the year dropdown with available years from the database
			$conn = mysqli_connect("localhost", "root", "", "projdb");
			$result = mysqli_query($conn, "SELECT DISTINCT YEAR(date) AS year FROM crimes ORDER BY year DESC");
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
			}
		?>
	</select>

	<button onclick="loadChart()">Load Chart</button>

	<canvas id="chart"></canvas>

	<script>
		function loadChart() {
			// Get the selected year from the dropdown
			var year = document.getElementById("year").value;
			console.log(year);

			// Fetch data from the server
			axios.get("get_crime_stat.php?year=" + year).then(response => {
				var data = response.data;
				console.log(data);

				// Prepare response data for Chart.js
				var labels = data.labels;
				var datasets = data.datasets;

				// Render the chart
				var ctx = document.getElementById("chart").getContext("2d");
				var chart = new Chart(ctx, {
					type: "line",
					data: {
						labels: labels,
						datasets: datasets
					},
					options: {
						title: {
							display: true,
							text: "Crime Statistics for " + year
						},
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero: true
								}
							}]
						}
					}
				});
			}).catch(error => {
				console.log(error);
			});
		}


		function getRandomColor() {
			var letters = "0123456789ABCDEF";
			var color = "#";
			for (var i = 0; i < 6; i++) {
				color += letters[Math.floor(Math.random() * 16)];
			}
			return color;
		}
	</script>
</body>
</html>
