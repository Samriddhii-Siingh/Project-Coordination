<?php
  include("connection.php");
  include('header_file.php');   
  include('footer.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link rel="stylesheet" href="student.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
    <div class="main-body"> 
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class=" align-items-center text-center">
                  <img src="64572.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <?php 
                            if($_SESSION['student_id']) {
                                $sid = $_SESSION['student_id'];

                                $st_query = "SELECT name from student where student_id = '$sid'";
                                $result = mysqli_query($conn, $st_query);

                                while ($row = mysqli_fetch_array($result)) {
                                  echo "<h4>". $row['name'] . "</h4>";
                                }
                                
                                echo "<p style=\"font-weight: bold;\" class=\"text-secondary mb-1\">" . $_SESSION['student_id'] . "</p>";

                                echo "<p class=\"text-muted font-size-sm\">Student</p>";

                            }
                        ?>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="align-items-center text-center">
            </div>
            </div>
            <div class="col-md-8">
              <div class="row gutters-sm">
                <div class="col-sm-9 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Assigned Projects</i></h6>
                      <?php
                      $id = $_SESSION["student_id"];
                      $query="SELECT * FROM assigned where student_id = '$id'";
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
                }?>
        </table>
              </br>
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