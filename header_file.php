<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
</head>
<body>
    <nav>
        <label class="title">Projectify...</label>

        <ul>
            
            <li><a href="student.php" class="active">Dashboard</a></li>
            <li><a href="form.php">Form</a></li>
            <li><a href="project.php">Projects</a></li>
            <li><a href="teacherdash.php">Mentors</a></li>
            
            <button type="button" class="logOut"><a href="logout.php">Log Out</a></button>
        </ul>
    </nav>
</body>
</html>