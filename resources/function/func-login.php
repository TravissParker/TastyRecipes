<?php
session_start();
$_SESSION['usernameError'] = $_SESSION['passwordError'] = $_SESSION['otherError'] = "";

if (isset($_POST['submitLogin'])) {
    include 'func-dhb-connect.php';
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $password = mysqli_real_escape_string($conn, $_POST['userPassword']);


    if (empty($userName) || empty($password)) {
        if(empty($userName)) { $_SESSION['usernameError'] = "Username is required";}
        if(empty($password)) { $_SESSION['passwordError'] = "Password is required"; }

        header('Location: /TastyRecipes/tsrc/View/UserHandler');
        exit();

    } else {
        $sqlLine = "SELECT * FROM users WHERE user_name='$userName' AND user_password='$password'";
        $result = mysqli_query($conn, $sqlLine);
        var_dump($conn);
        $numRows = mysqli_num_rows($result);

        if ($numRows < 1) {
            $_SESSION['otherError'] = "The username and/or password was incorrect";
//            header('Location: /TastyRecipes/tsrc/View/Calendar');
            exit();

        } else {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['userId'] = $row['user_id'];
            $_SESSION['userName'] = $row['user_name'];
            $_SESSION['userPassword'] = $row['user_password'];
//            header('Location: /TastyRecipes/tsrc/View/FirstPage');
            header('Location: /TastyRecipes/tsrc/View/FirstPage');
            exit();
        }
    }

}
