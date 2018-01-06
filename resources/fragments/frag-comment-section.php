<?php

echo "<div class='comment-wrap'>
      <h3>Comments</h3>";

if (isset($username)) {
    echo "
        <textarea name='post' data-bind='textInput: post'></textarea>
        <button type='submit' name='commentSubmit' data-bind='click: postComment'>Comment</button>
      ";
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

//Here we do all data-binding, it is in the form of a fragment since it used in two places.
echo   "<div data-bind='foreach: comments'>";
echo        "<div class='comment-box'>";
echo            "<p data-bind='text: author'><br />";
echo            "</p>";
echo            "<p data-bind='text: msg'><br />";
echo            "</p>";

echo         "<!-- ko if: trueWriter == true -->";
echo            "<p class='delete-form'>";
echo                "<button name='commentDelete' data-bind='click: \$parent.deleteComment'>Delete</button>";
echo            "</p>";
echo        "<!-- /ko -->";

echo        "</div>";
echo   "</div>";

echo "</div>";
