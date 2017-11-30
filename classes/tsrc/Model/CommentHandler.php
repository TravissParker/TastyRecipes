<?php

namespace tsrc\Model;


use tsrc\Integration\DBHandler;

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
        //Fixme: we must vlidate empty message
        $this->dbHandler->setComment($author, $date, $message, $recipe);
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
//            $this->comments = $comment;//Does this work?
        }
        return $this->comments;
    }

    public function deleteComment($comID)
    {
        $this->dbHandler->deleteComment($comID);
    }

}