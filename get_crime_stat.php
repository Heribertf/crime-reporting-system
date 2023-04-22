<?php
require_once "config.php";
// Get selected year from user
if (isset($_GET['year'])) {
    $selected_year = $_GET['year'];
} else {
    $selected_year = date('Y');
}

// Prepare SQL query
$sql = "SELECT location, MONTH(date) AS month, COUNT(*) AS total_crimes 
        FROM crimes 
        WHERE YEAR(date) = '$selected_year' 
        GROUP BY location, MONTH(date) 
        ORDER BY location, MONTH(date)";

// Execute SQL query
$result = mysqli_query($conn, $sql);

// Prepare data for Chart.js
$labels = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$datasets = array();
$locations = array();

while ($row = mysqli_fetch_assoc($result)) {
    $location = $row['location'];
    $month = intval($row['month']) - 1; // adjust month to start from index 0
    $total_crimes = intval($row['total_crimes']);

    if (!in_array($location, $locations)) {
        // Add new dataset for the location
        array_push($locations, $location);
        $new_dataset = array(
            'label' => $location,
            'data' => array_fill(0, 12, 0), // initialize data array with zeros
            'fill' => false,
            'borderColor' => '#' . substr(md5(rand()), 0, 6), // random color for line
        );
        array_push($datasets, $new_dataset);
    }

    // Update the data for the month
    $location_index = array_search($location, $locations);
    $datasets[$location_index]['data'][$month] = $total_crimes;
}

// Prepare response data for Chart.js
$data = array(
    'labels' => $labels,
    'datasets' => $datasets,
);

echo json_encode($data);
?>
