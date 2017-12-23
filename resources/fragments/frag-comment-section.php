<?php
include $_SERVER['DOCUMENT_ROOT']."/resources/function/func-dhb-connect.php";
require $_SERVER['DOCUMENT_ROOT']."/TastyRecipes/resources/function/func-comments.php";

echo "<div class='comment-wrap'>
      <h3>Comments</h3>";

if (isset($username)) {
    echo "
        <textarea name='message' data-bind='textInput: message'></textarea>
        <button type='submit' name='commentSubmit' data-bind='click: postComment'>Comment</button>
      ";
}

//Todo: these two should be javascripted instead
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
