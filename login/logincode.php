<?php
session_start();
include('../admin/config/dbcon.php');

if(isset($_POST['login']))
{
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT
	`user`.id, 
	`user`.email, 
	`user`.password, 
	`user`.firstname, 
	`user`.lastname, 
	`user`.account_type, 
	`user`.account_status
FROM
	`user`
WHERE
	`user`.email = '$email' AND
	`user`.password = '$password'
LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        foreach ($login_query_run as $data) {
            $user_id = $data['id'];
            $full_name = $data['firstname'] . ' ' . $data['lastname'];
            $account_status = $data['account_status'];
            $account_type = $data['account_type'];
            $user_email = $data['email'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['account_type'] = "$account_type";
        $_SESSION['u_status'] = "$account_status";
        $_SESSION['auth_user'] = [
            'user_id' =>$user_id,
            'user_name' =>$full_name,
            'user_email' =>$user_email,
        ];

            if($_SESSION['u_status'] != '3')
            {
                if( $_SESSION['account_type'] == '1')
        {
            $_SESSION['status'] = "Welcome $full_name";
            $_SESSION['status_code'] = "success";
            header("Location: ../admin/index.php");
            exit(0);
        }elseif( $_SESSION['account_type'] == '10')
        {
            $_SESSION['status'] = "Welcome $full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: ./student/index.php");
            exit(0);
        }
        elseif( $_SESSION['account_type'] == '3')
        {
            $_SESSION['status'] = "Welcome $full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: ./supervisor/index.php");
            exit(0);
        }
        elseif( $_SESSION['account_type'] == '2')
        {
            $_SESSION['status'] = "Welcome $full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: ./coordinator/index.php");
            exit(0);
        } 
            }else{

                $_SESSION['status'] = "Your Account has been Archived";
                $_SESSION['status_code'] = "error";
                header("Location: index.php");
                exit(0);
            exit(0); 
            }
           

           
        }
        else{
            $_SESSION['status'] = "Invalid Username and Password";
            $_SESSION['status_code'] = "error";
            header("Location: index.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "Invalid Username and Password";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit(0);
    }   


?>

