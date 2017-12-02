<?php
  include 'resources/fragments/frag-nav.php';
//  if (isset($_SESSION['userId'])) {
//    header("Location: index.php?alreadysignedin");
//  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>

  <link rel="stylesheet" type="text/css" href="../../resources/css/reset.css" />
  <link rel="stylesheet" type="text/css" href="../../resources/css/base.css" />
  <link rel="stylesheet" type="text/css" href="../../resources/css/nav.css" />
  <link rel="stylesheet" type="text/css" href="../../resources/css/button.css" />
  <link rel="stylesheet" type="text/css" href="../../resources/css/log-sign-in.css"/>
</head>
<body>
  <div class="page-wrap">
    <div class="text-wrap">
      <form action="Login" method="post">
        Username:
        <input type="text" name="userName" placeholder="Username">
        <span class="error-msg"> * <?php echo $usernameError ?></span>
        <br />
        Password:
        <input type="password" name="userPassword" placeholder="password">
        <span class="error-msg"> * <?php echo $passwordError ?></span>
        <p class="error-msg"><?php echo $loginError ?></p>
        <p class="error-msg"><?php echo $controlChar ?></p>
        <button class="login-buttons" type="submit" name="submitLogin">Login</button>
        <br/>
      </form>
      <?php echo $username ?>
      <?php include 'resources/fragments/frag-signup-result.php' ?>
    </div>
  </div>
</body>
</html>



