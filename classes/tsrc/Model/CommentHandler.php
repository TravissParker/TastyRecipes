<?php

namespace tsrc\Model;


use tsrc\Integration\DBHandler;
use tsrc\Util\InputValidator;

class CommentHandler
{
    private $comments;
    private $dbHandler;

    public function __construct()
    {
        $this->dbHandler = new DBHandler();
        $this->comments = Array();
    }

    public function setComment($author, $message, $sourcePage)
    {
        if (InputValidator::fieldIsEmpty($message)) {
            return false; //If the post is empty, false is return and set to the next view, preventing the "Comment posted below" post.
        }
        $message = InputValidator::vetInput($message);
        $this->dbHandler->setComment($author, $message, $sourcePage);
        return true;
    }

    public function getComments($currentPage, $currentHigh)
    {
        $result = $this->dbHandler->extractComments($currentPage, $currentHigh);

        while ($row = $result->fetch_assoc()) {
            $comment = new Comment();
            $comment->setAuthor($row['com_user']);
            $comment->setMsg($row['com_msg']);
            $comment->setComID($row['com_id']);
            array_push($this->comments, $comment);
        }

        return $this->comments;
    }

    public function deleteComment($comID)
    {
        $this->dbHandler->deleteComment($comID);
    }

}