<?php   include 'resources/fragments/frag-nav.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Index TR</title>

  <?php require \tsrc\Util\Constants::INCOMMON_LINKS; ?>
  <link rel="stylesheet" type="text/css" href="../../resources/css/log-sign-in.css" />
</head>
<body>
  <div class="page-wrap">
    <div class="text-wrap">
      <div class="form-wrap">
        <form action="Signup" method="post">
          Username:
          <input type="text" name="newUsername" placeholder="Username">
          <span class="error-msg"> * <?php echo $usernameError ?></span>
          <br />
          Password:
          <input type="password" name="newPassword" placeholder="Password">
          <span class="error-msg"> * <?php echo $passwordError ?></span>
          <br />
          Password:
          <input type="password" name="newPasswordR" placeholder="Retype password">
          <span class="error-msg"> * <?php echo $passwordErrorR ?></span>
          <p class="error-msg"><?php echo $passwordMismatch ?></p>
          <button type="submit" name="registerSubmit">Sign up</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
