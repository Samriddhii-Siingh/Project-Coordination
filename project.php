<?php
session_start();

include("connection.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="project.css">
</head>
<body>
    
    <div class="container">
        <div class="content">
            <section class="sidebar">    
                <nav>
                    <ul class="menu-options">
                        <i class="fa fa-user-o icon" aria-hidden="true" style="color: #00ADB5;"></i>

                        <?php 
                            if($_SESSION['student_id']) {
                                $sid = $_SESSION['student_id'];

                                $st_query = "SELECT name from student where student_id = '$sid'";
                                $result = mysqli_query($conn, $st_query);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<p>". $row['name'] . "</p>";
                                }
                                
                                echo "<p style=\"font-weight: bold;\">" . $_SESSION['student_id'] . "</p>";

                                echo "<p>Student</p>";

                            } elseif($_SESSION['teacher_id']) {
                                echo $_SESSION['teacher_id'];
                                echo "<br>";
                                $tid = $_SESSION['teacher_id'];

                                $tch_query = "SELECT name from teacher where teacher_id = '$tid'";
                                $result = mysqli_query($conn, $tch_query);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo $row['name'];
                                }

                                echo "<br>";
                                echo "Teacher";
                            }
                        ?>
                        <li> <a href="home.php"><i class="fa fa-home icon" aria-hidden="true"></i></a> </li>
                        <li> <a href="form.php"><i class="fa fa-pencil-square-o icon" aria-hidden="true"></i></a> </li>
                        <li class="selected"> <i class="fa fa-th-large icon" aria-hidden="true"></i> </li>
                        <li> <a href="#"><i class="fa fa-search icon" aria-hidden="true"></i></a> </li>
                        <li> <a href="#"><i class="fa fa-user-o icon" aria-hidden="true"></i></a> </li>
                        <li> <a href="logout.php"><i class="fa fa-sign-out icon" aria-hidden="true"></i></a> </li>
                    </ul>
                </nav>
            </section>
    
            <section class="main-content">
                <div class="app">
                    
                    <section class="app-content">
                        <header>
                            <div class="searchbox">
                                <div class="icon"> 
                                    <i class="fa fa-search" aria-hidden="true"></i> </div>
                                    <input type="text" name="search" placeholder="Search a project" class="search-text">
                            </div>
                        </header>
    
                        <ul class="projects">
                            <?php 
                                $q1= "SELECT * from project ";
                                $result=mysqli_query($conn,$q1);
                                while($row = mysqli_fetch_array($result)) {
                                    echo '<li class="project-item">
                                            <div class="title-row">
                                                <h3>' . 
                                                $row['name'] . 
                                                '</h3>
                                            </div>
                                            <div class="desc-row">
                                                <p>' . 
                                                $row['description'] . 
                                                '</p>
                                            </div>
                                        </li>';
                                } 
                            ?>   
                        </ul>
                    </section>
                </div>
            </section>
        </div>
    </div>
</body>
</html>