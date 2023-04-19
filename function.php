<?php

function check_login($conn)
{
    if(isset($_SESSION['teacher_id']))
    {
        $id = $_SESSION['teacher_id'];
        $query = "select * from teacher where teacher_id = '$id' limit 1";

        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0) 
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    elseif(isset($_SESSION['student_id']))
    {
        $id = $_SESSION['student_id'];
        $query = "select * from student where student_id = '$id' limit 1";

        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0) 
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

?>