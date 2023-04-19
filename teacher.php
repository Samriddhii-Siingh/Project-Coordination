<?php
  include("header.php");
  include("connection.php");

   
if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $pid =$_POST['pid'];
        $domain = mysqli_real_escape_string($conn,$_POST['domain']);
        $lang=mysqli_real_escape_string($conn,$_POST['language']);
        $desc=mysqli_real_escape_string($conn,$_POST['desc']);

        
        $sql_insert1 ="INSERT INTO project(project_id,name,domain,language,description)
            VALUES ('$pid','$name','$domain','$lang','$desc')";
          
        if(mysqli_query($conn,$sql_insert1))
        {
            echo '<script>alert("Product added successfully")</script>';
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Teacher Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link rel="stylesheet" href="teacher.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <br><br>
<div class="container">
    <div class="main-body"> 
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class=" align-items-center text-center">
                  <img src="64572.png" alt="Admin" class="rounded-circle" width="150">
                  </div>
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="mt-3">
                    <?php 
                            if($_SESSION['teacher_id']) {
                                $sid = $_SESSION['teacher_id'];

                                $st_query = "SELECT name from teacher where teacher_id = '$sid'";
                                $result = mysqli_query($conn, $st_query);

                                while ($row = mysqli_fetch_array($result)) {
                                  echo "<h4>". $row['name'] . "</h4>";
                                }
                                
                                echo "<p style=\"font-weight: bold;\" class=\"text-secondary mb-1\">" . $_SESSION['teacher_id'] . "</p>";

                                echo "<p class=\"text-muted font-size-sm\">Teacher</p>";

                            }
                        ?>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="d-flex flex-column align-items-center text-center">
              <div class="card col-sm-12 mt-3">
              <h6 class="title">Upload a Project</h6>
                <form action="" class="form" method="POST">
                  <label for="tid" class="TID">
                    Enter project Name
                  </label>
                  </br>
                  <input type="text" class="name" id="name" name="name" placeholder="Project name"/>
                  </br>
                  
                  <label for="tid" class="PID">
                    Enter Project ID
                  </label>
                  <br>
                  <input type="text" class="pid" id="pid" name="pid" placeholder="Project ID"/>
                  </br>
                  <label for="tid" class="TID">
                    Enter Project Domain
                  </label>
                  <br>
                  <input type="text" class="domain" id="domain" name="domain" placeholder="Project Domain"/>
                  </br>
                  <label for="tid" class="TID">
                    Enter Project Language
                  </label>
                  <br>
                  <input type="text" class="language" id="language" name="language" placeholder="Language"/>
                  </br>
                  <label for="tid" class="TID">
                    Enter Project Description
                  </label>
                  <br>
                  <input type="textarea" class="desc" id="desc" name="desc" placeholder="Description"/>
                  </br>
                  <br>
                  <input type="submit" value="submit" name="submit" class="button">
                </form>
                <br>
              </div>
            </div>
            </div>
            <div class="col-md-8">
              <div class="row gutters-sm">
                <div class="col-sm-9 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Assigned Projects</i></h6>
                      <?php
                      $id = $_SESSION["teacher_id"];
                      $query="SELECT * FROM assigned where teacher_id = '$id'";
                      $res=mysqli_query($conn,$query);
                    ?>
                    <table>
            <tr>
                <th>Student ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th>Teacher ID&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th>Project ID</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=mysqli_fetch_array($res))
                {
            ?>
           
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['student_id'];?>&nbsp</td>
                <td><?php echo $rows['teacher_id'];?>&nbsp&nbsp&nbsp</td>
                <td>&nbsp<?php echo $rows['project_id'];?>&nbsp&nbsp</td>
            </tr>
            <?php
                }
            ?>
        </table>
              </br>
                      </div>
                  </div>
                </div>
                <div class="col-sm-9 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Uploaded Projects by other Mentors</h6>          
                      <?php
                      $query="SELECT * FROM project";
                      $res=mysqli_query($conn,$query);
                    ?>
                    <table>
            <tr>
                <th>Project ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th>Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th>Domain</th>
                <th>Language</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=mysqli_fetch_array($res))
                {
            ?>
           
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['project_id'];?>&nbsp</td>
                <td><?php echo $rows['name'];?>&nbsp&nbsp&nbsp</td>
                <td>&nbsp<?php echo $rows['domain'];?>&nbsp&nbsp</td>
                <td>&nbsp<?php echo $rows['language'];?>&nbsp&nbsp</td>
            </tr>
            <?php
                }
            ?>
        </table>  
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>