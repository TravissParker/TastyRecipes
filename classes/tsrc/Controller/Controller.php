<?php
namespace tsrc\Controller;

use tsrc\Exceptions\MissingInputException;
use tsrc\Exceptions\CredentialsException;
use tsrc\Exceptions\PasswordException;
use tsrc\Exceptions\UsernameException;
use tsrc\Integration\DBHandler;
use tsrc;
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
        try {
            $this->userHandler->loginUser($shuttle);
        } catch (MissingInputException | CredentialsException $e) {
            throw $e;
        }
    }

    public function registerUser($shuttle)
    {
        try {
            $this->userHandler->registerUser($shuttle);
        } catch (MissingInputException | PasswordException | UsernameException $e) {
            throw $e;
        }
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