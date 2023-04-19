<?php

session_start();

    if(isset($_SESSION['teacher_id']))
    {
        unset($_SESSION['teacher_id']);
    }
    elseif(isset($_SESSION['student_id']))
    {
        unset($_SESSION['student_id']);
    }

    header("Location: login.php");
    die;

?>