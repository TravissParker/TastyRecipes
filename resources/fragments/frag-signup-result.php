<?php

if ($signupSuccess) {
    echo "Sign up was successful!<br />Use your credentials to sign in above.";
} else {
    echo '<form action="Signup">
            <p>Not a member? Click the button below to sign up!</p>
            <button class="login-buttons" type="submit" name="signup">Sign up</button>
          </form>';
}