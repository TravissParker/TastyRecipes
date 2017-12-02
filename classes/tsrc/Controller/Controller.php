<?php
namespace tsrc\Controller;

use tsrc\Integration\DBHandler;
use tsrc\Model\CommentHandler;
use tsrc\Model\UserHandler;

class Controller
{
    private $userHandler;
    private $dbHandler;
    private $commentHandler;

    public function __construct()
    {
        $this->userHandler = new UserHandler();
        $this->dbHandler = new DBHandler();
        $this->commentHandler = new CommentHandler();
    }

    public function loginUser($shuttle)
    {
        $this->userHandler->loginUser($shuttle);
    }

    public function registerUser($shuttle)
    {
        $this->userHandler->registerUser($shuttle);
    }

    public function setComment($author, $date, $message, $recipe)
    {
        return $this->commentHandler->setComment($author, $date, $message, $recipe);
    }

    public function deleteComment($comID)
    {
        $this->commentHandler->deleteComment($comID);
    }

    public function showComments($recipe)
    {
        return $this->commentHandler->getComments($recipe);
    }
}