<?php

include("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <section class="sidebar">    
                <nav>
                    <ul class="menu-options">
                        <li> <i class="fa fa-home icon" aria-hidden="true"></i> </li>
                        <li class="selected"> <i class="fa fa-th-large icon" aria-hidden="true"></i> </li>
                        <li> <i class="fa fa-calendar icon" aria-hidden="true"></i> </li>
                        <li> <i class="fa fa-comment-o icon" aria-hidden="true"></i> </li>
                        <li> <i class="fa fa-clock-o icon" aria-hidden="true"></i> </li>
                        <li> <i class="fa fa-user-o icon" aria-hidden="true"></i> </li>
                        <li> <i class="fa fa-wrench icon" aria-hidden="true"></i> </li>
                    </ul>
                </nav>
    
                </section>
    
            <section class="main-content">
                <div class="app">
                    
                    <section class="app-content">
                        <header>
                            <div class="searchbox">
                                <div class="icon"> <i class="fa fa-search" aria-hidden="true"></i> </div>
                                <input type="text" name="search" placeholder="Search a project" class="search-text"> </input>
                            </div>
    
                            <div class="app-list-options">
                                
                                <div class="display-group">
                                    
                                </div>
                            </div>
    
                        </header>
    
                        <ul class="projects">
                            <?php $q1= "SELECT * from teacher ";
                                $result=mysqli_query($conn,$q1);
                                while($row = mysqli_fetch_array($result)) {
                                    echo '<li class="project-item">
                                            <div class="title-row">
                                                <h3>' . 
                                                $row['name'] . 
                                                '</h3>
                                            </div>
                                            <br>
                                            <div>
                                            language: '.$row['language'].'
                                            </div>
                                            <div>
                                            Domain: '.$row['domain'].'
                                            </div>
                                            
                                            <div>
                                                ID: '. $row['teacher_id'] . 
                                                '
                                            </div>
                                            
                                            <div>
                                            Email ID: '.$row['email'].'
                                            </div>
                                            <div>
                                            Gender : '.$row['gender'].'
                                            </div>
                                        </li>';
                                } ?>          
                        </ul>
                    </section>
                </div>
            </section>
        </div>
    </div>
</body>
</html>