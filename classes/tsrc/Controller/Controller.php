<?php
//Todo: add more ternary operators
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
    //Todo: implement logout - now in firstpage, is that ok? - Should be a dedicated function but it is OK.
    public function logoutUser()
    {
        //Logout = invalidated session, it does what my script did - it should be in readme file.
    }

    public function registerUser($shuttle)
    {
        $this->userHandler->registerUser($shuttle);
    }

    public function setComment($author, $date, $message, $recipe)
    {
        $this->commentHandler->setComment($author, $date, $message, $recipe);
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