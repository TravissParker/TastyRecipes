<?php
include $_SERVER['DOCUMENT_ROOT']."/resources/function/func-dhb-connect.php";
require $_SERVER['DOCUMENT_ROOT']."/TastyRecipes/resources/function/func-comments.php";

echo "<div class='comment-wrap'>
      <h3>Comments</h3>";

//If user is signed in => show text area
if (isset($username)) {
//    setComment($conn);
    echo "<form method='post' action='" . $_SERVER['REQUEST_URI'] . "'>
        <input type='hidden' name='author' value='" . $username . "'>
        <input type='hidden' name='date' value='" . date('Y-m-d H:i:s') . "'>
        <input type='hidden' name='recipePage' value='" . $_SERVER['REQUEST_URI'] . "'>
        <textarea name='message'></textarea>
        <button type='submit' name='commentSubmit'>Comment</button>
      </form>";
 /*
  * setComment($conn) gets called - nothing happens (variable is not set)
  * echo executes - action is empty, but variable is set. Empty action = reload current page
  * setComment($conn) is called, now variable is set
  * No on is the wiser.
  */
}

if ($commentPosted == true) {
    echo '<div class="comment-notification">
            <p>Your comment has been posted below!</p>
          </div>';
}

if ($commentDeleted == true) {
    echo '<div class="comment-notification">
            <p>Your comment has been deleted!</p>
          </div>';
}

printComments($commentsList, $username);

echo "</div>";
