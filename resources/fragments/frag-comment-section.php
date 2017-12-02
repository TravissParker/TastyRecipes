<?php
include $_SERVER['DOCUMENT_ROOT']."/resources/function/func-dhb-connect.php";
require $_SERVER['DOCUMENT_ROOT']."/TastyRecipes/resources/function/func-comments.php";

echo "<div class='comment-wrap'>
      <h3>Comments</h3>";

if (isset($username)) {
    echo "<form method='post' action='" . $_SERVER['REQUEST_URI'] . "'>
        <input type='hidden' name='author' value='" . $username . "'>
        <input type='hidden' name='date' value='" . date('Y-m-d H:i:s') . "'>
        <input type='hidden' name='recipePage' value='" . $_SERVER['REQUEST_URI'] . "'>
        <textarea name='message'></textarea>
        <button type='submit' name='commentSubmit'>Comment</button>
      </form>";
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
