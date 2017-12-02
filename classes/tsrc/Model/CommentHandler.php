<?php

namespace tsrc\Model;


use tsrc\Integration\DBHandler;
use tsrc\Util\InputValidator;

class CommentHandler
{
    private $comments; //array of comments
    private $dbHandler;

    public function __construct()
    {
        $this->dbHandler = new DBHandler();
        $this->comments = Array();
    }

    public function setComment($author, $date, $message, $recipe)
    {
        if (InputValidator::fieldIsEmpty($message)) {
            return false; //If the message is empty, false is return and set to the next view, preventing the "Comment posted below" message.
        }
        $message = InputValidator::vetInput($message);
        $this->dbHandler->setComment($author, $date, $message, $recipe);
        return true;
    }

    public function getComments($recipe)
    {
        $result = $this->dbHandler->extractComments($recipe);

        while ($row = $result->fetch_assoc()) {
            $comment = new Comment();
            $comment->setAuthor($row['com_user']);
            $comment->setDate($row['com_date']);
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