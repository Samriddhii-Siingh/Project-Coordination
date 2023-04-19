<?php
    include('header_file.php');
    include("connection.php");
    include("footer.php");
  
    if(isset($_POST['submit']))
    {
        $lang = mysqli_real_escape_string($conn,$_POST['language']);
        $mentor = $_POST['faculty'];
        $project = mysqli_real_escape_string($conn,$_POST['projects']);
        $sid  = $_SESSION['student_id'];
        
        $sql_insert =
        "INSERT INTO form_data(language,mentor,project,student_id)
            VALUES ('$lang','$mentor','$project','$sid')";
          
          if(mysqli_query($conn,$sql_insert))
        {
            echo '<script>alert("Product added successfully")</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="thought">
    Choose your Project</br>Choose your Dream
    </div>
    <div class="forms">
        <h2>Register Your Project</h2>
        <form action="" method="post">
        <label for="Lang">Language</label>
        <div class="input-field">
            <select name="language" id="language" onchange="FetchFaculty(this.value)">
            <option value=""none>please select</option>
            <?php 
             $query= "SELECT DISTINCT language from project";
            $res=mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($res)) {?>
            <option value="<?php echo $row['language'];?>">
                <?php echo $row['language'];?></option>
            <?php } ?>    
            </select>
            <br>
        </div>
            <div class="input-field">
            <label for="faculty">Faculty</label>
            <select name="faculty" id="faculty">
                <option value="none">Please Select</option>
             <?php $q1= "SELECT name,teacher_id from teacher";
            $result=mysqli_query($conn,$q1);
            while($row = mysqli_fetch_array($result)) {?>
            <option value="<?php echo $row['teacher_id'];?>">
                <?php echo $row['name'];?></option>
            <?php } ?>
            </select>
            </div>
            <br>
            <div class="input-field">
            <label for="projects">Projects</label>
            <select name="projects" id="projects">
            <option value="none">Please Select</option>
            <?php $q2= "SELECT name,project_id from project";
            $result=mysqli_query($conn,$q2);
            while($row = mysqli_fetch_array($result)) {?>
            <option value="<?php echo $row['project_id'];?>">
                <?php echo $row['name'];?></option>
            <?php } ?>
            </select>
            </div>
            <br>
            <input type="submit" value="Submit Form" name="submit" class="button">
        </form>
    </div>
    </script>
</body>
</html>