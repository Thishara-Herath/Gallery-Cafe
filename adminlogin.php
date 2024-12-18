<?php
include("dbconn.php");
session_start();
if(isset($_POST['email'])&& isset($_POST['password']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty($email))
    {
        header("Location:admin.php");
        exit();
    }
    elseif(empty($password))
    {
        header("Location:admin.php");
        exit();
    }
    else
    {
        // echo $email.$password;
        $sql="Select * from admin where email='$email' and password='$password'";
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result))
        {
            $row=mysqli_fetch_assoc( $result);
            if($row['email']==$email && $row['password']==$password)
                {
                   $_SESSION['email']=$row['email'];
                   
                   $_SESSION['id']=$row['id'];
                   header("Location:userprofile.php");
                }
            else
                { 
                        header("Location:admin.php");
                        exit();
                }
        }
        else
        { 
                header("Location:admin.php");
                exit();
        }
    }
}


?>