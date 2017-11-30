<?php
if ($username != null) {
    echo "<form class='logout-btn' method='post' action='FirstPage'>
            <button type='submit' name='logoutSubmit'>Sign out</button>
            </form>";
    echo "<div class='sign-in-status'>Howdy, " . $username . "</div>";
} else {
    echo "<form class='logout-btn' method='post' action='Login'>
            <button type='submit'>Sign in</button>
            </form>";
}
