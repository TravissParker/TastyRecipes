<?php

session_start();
$_SESSION['usernameError'] = $_SESSION['passwordError'] = "";
$_SESSION['passwordErrorR'] = $_SESSION['otherError'] = "";
$_SESSION['signupSuccess'] = false;

if (isset($_POST['registerSubmit'])) {
    include_once 'func-dhb-connect.php';
    $newUsername    = mysqli_real_escape_string($conn, $_POST['newUsername']);
    $newPassword    = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $newPasswordR   = mysqli_real_escape_string($conn, $_POST['newPasswordR']);

    if (empty($newUsername) || empty($newPassword) || empty($newPasswordR)) {
        if(empty($userName)) { $_SESSION['usernameError'] = "Username is required";}
        if(empty($password)) { $_SESSION['passwordError'] = "Password is required"; }
        if(empty($passwordR)) { $_SESSION['passwordErrorR'] = "Password is required"; }
        header("Location: ../../signup.php?emptyfields");
        exit();

    } else {
        if ($newPassword != $newPasswordR) {
            header("Location: ../../signup.php?passwordnomatch");
            exit();

        } else {
            //Check if username is take
            $sqlQuery = "SELECT * FROM users WHERE user_name ='$newUsername'";
            $result = mysqli_query($conn, $sqlQuery);
            $numRows = mysqli_num_rows($result);

            if ($numRows > 0) {
                header("Location: ../../signup.php?usernametaken");
                exit();

            } else {
                $sqlQuery = "INSERT INTO users (user_name, user_password) VALUE ('$newUsername', '$newPassword')";
                mysqli_query($conn, $sqlQuery);
                $_SESSION['signupSuccess'] = true;
                header("Location: ../../login.php?registrationsuccess");
                exit();
            }
        }
    }
}