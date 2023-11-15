<?php

session_start();

    // session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['auth_role']);
    unset( $_SESSION['auth_user']);

    $_SESSION['status'] = "You have been logout!";
    $_SESSION['status_code'] = "success";
    header("Location: ../login/index.php");
    exit(0);
?>
