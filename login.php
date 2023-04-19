<?php
session_start();

    include("connection.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $btValue = $_POST['enter'];
        if($btValue == 'register')
        {
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $uid = $_POST['uid'];
            $title  = $_POST['job_title'];

            if($title == 'Teacher')
            {
                $query = "insert into teacher(t_id, name, password, email) values ('$uid','$uname','$password','$email');";
                mysqli_query($conn, $query);
            }
            elseif($title == 'Student')
            {
                $query = "insert into student(name, email, s_id, password) values ('$uname','$email','$uid','$password');";
                mysqli_query($conn, $query);
            }
            else
            {
                //header("Location: 404error.php");
                //sdie;
            }
        }
        elseif($btValue == 'login')
        {
            $uid = $_POST['uid'];
            $password = $_POST['password'];
            $title = $_POST['job_title'];

            if($title == 'teacher')
            {
                $query = "select * from teacher where teacher_id = '$uid' limit 1";
                $result = mysqli_query($conn, $query);

                if($result)
                {
                    if($result && mysqli_num_rows($result) > 0)
                    {
                        $user_data = mysqli_fetch_assoc($result);
                        {
                            if($user_data['password'] === $password)
                            {
                                $_SESSION['teacher_id'] = $user_data['teacher_id'];
                                header("Location: teacher.php");
                                die;
                            }
                        }
                    }
                }
            }
            elseif($title == 'student')
            {
                $query = "select * from student where student_id = '$uid' limit 1";
                $result = mysqli_query($conn, $query);

                if($result)
                {
                    if($result && mysqli_num_rows($result) > 0)
                    {
                        $user_data = mysqli_fetch_assoc($result);
                        {
                            if($user_data['password'] === $password)
                            {
                                $_SESSION['student_id'] = $user_data['student_id'];
                                header("Location: student.php");
                                die;
                            }
                        }
                    }
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>LOGIN</h2>
                    <form action="" method="post">
                        <input type="number" name="uid" id="" class="input-box" placeholder="User-id" required>
                        <input type="password" name="password" id="" class="input-box" placeholder="Password" required>
                        <input type="radio" name="job_title" class="radio-btn" value="teacher"><span class="radio-btn">Teacher</span>
                        <input type="radio" name="job_title" class="radio-btn" value="student"><span class="radio-btn">Student</span>
                        <button type="submit" name="enter" class="submit-btn" value="login">Submit</button>
                    </form>
                    <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
                    <a href="#">Forgot Password</a>
                </div>
                <div class="card-back">
                    <h2>REGISTER</h2>
                    <form action="" method="post">
                        <input type="text" name="uname" id="" class="input-box" placeholder="Your Name Here" required>
                        <input type="email" name="email" id="" class="input-box" placeholder="Email-id" required>
                        <input type="number" name="uid" id="" class="input-box" placeholder="User-id" required>
                        <input type="password" name="password" id="pswrd" class="input-box" placeholder="Password" required>
                        <input type="radio" name="job_title" class="radio-btn" value="Teacher"><span class="radio-btn">Teacher</span>
                        <input type="radio" name="job_title" class="radio-btn" value="Student"><span class="radio-btn">Student</span>
                        <button type="submit" name="enter" class="submit-btn" value="register">Submit</button>
                    </form>
                    <button type="button" class="btn" onclick="openLogin()">I already have an account</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="function.js"></script>
</body>
</html>