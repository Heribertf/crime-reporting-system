<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>User Dashboard</h2>
        <p>Welcome to your dashboard, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</p>
        <ul>
            <li><a href="index.php">Report a Crime</a></li>
            <li><a href="#">View Your Reports</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>    
</body>
</html>
