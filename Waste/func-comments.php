<?php

/*function printComments($array, $username) {
    foreach ($array as $comment) {
        echo   "<div class='comment-box'><p>".
                $comment->getAuthor()."    ".$comment->getDate()."<br />";
        echo    nl2br($comment->getMsg());
        echo    "</p>";
        if ($username != null) {
            if ($username == $comment->getAuthor()) {
                echo "<form class='delete-form' method='post' action=''>
                          <input type='hidden' name='comId' value='" . $comment->getComID() . "''>
                          <button name='commentDelete' type='submit'>Delete</button>
                      </form>";
            }
        }
        echo    "</div>";
    }
}*/
//Todo: delete this script
function printComments($username) {


//    echo "
//          <div data-bind='foreach: comment'>
//             <div class='comment-box'>
//               <p data-bind='text: author'><br /></p>
//               <p data-bind='text: msg'><br /></p>
//               <!-- ko if: com.trueWriter -->
//                 <p class='delete-form'>
//                   <button name='commentDelete' data-bind='click: \$parent.deleteComment'>Delete</button>
//                 </p>
//               <!-- /ko -->
//             </div>
//           </div>
//    ";
}