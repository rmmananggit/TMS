<?php
session_start();
include('../admin/config/dbcon.php');

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT
        `user`.id, 
        `user`.email, 
        `user`.password, 
        `user`.firstname, 
        `user`.lastname, 
        `user`.user_type, 
        `user`.user_status
    FROM
        `user`
    WHERE
        `user`.email = '$email' AND
        `user`.password = '$password'
    LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        foreach ($login_query_run as $data) {
            $user_id = $data['id'];
            $full_name = $data['firstname'] . ' ' . $data['lastname'];
            $user_status = $data['user_status'];
            $user_type = $data['user_type'];
            $user_email = $data['email'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['user_type'] = "$user_type";
        $_SESSION['u_status'] = "$user_status";
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $full_name,
            'user_email' => $user_email,
        ];

        if ($_SESSION['u_status'] == '3') {
            $_SESSION['status'] = "Your account has been deactivated";
            $_SESSION['status_code'] = "error";
            header("Location: ../login/index.php");
            exit(0);
        } elseif ($_SESSION['u_status'] == '2') {
            $_SESSION['status'] = "Your account is still pending";
            $_SESSION['status_code'] = "warning";
            header("Location: ../login/index.php");
            exit(0);
        } elseif ($_SESSION['u_status'] == '1') {
            // Proceed to login based on account type
            if ($_SESSION['user_type'] == '1') {
                $_SESSION['status'] = "Welcome $full_name";
                $_SESSION['status_code'] = "success";
                header("Location: ../admin/index.php");
                exit(0);
            } elseif ($_SESSION['user_type'] == '2') {
                $_SESSION['status'] = "Welcome $full_name!";
                $_SESSION['status_code'] = "success";
                header("Location: ../tutor/index.php");
                exit(0);
            } elseif ($_SESSION['user_type'] == '3') {
                $_SESSION['status'] = "Welcome $full_name!";
                $_SESSION['status_code'] = "success";
                header("Location: ../tutee/index.php");
                exit(0);
            }   else {
                $_SESSION['status'] = "Invalid account type";
                $_SESSION['status_code'] = "error";
                header("Location: ../login/index.php");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "Invalid Username and Password";
            $_SESSION['status_code'] = "error";
            header("Location: index.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "Invalid Username and Password";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit(0);
    }
}
?>
