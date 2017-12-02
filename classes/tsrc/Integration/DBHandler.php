<?php


namespace tsrc\Integration;

require 'C:/Server/data/DBCredentials.php';

class DBHandler
{
    const DB_NAME = 'tasty_recipes';
    private $database;
    private $findUserStmt;
    private $insertUserStmt;
    private $findNameStmt;
    private $setCommentStmt;
    private $getCommentStmt;
    private $deleteCommentStmt;
    private $getPassword;

    private function createConnection()
    {
        if ($this->database == null) {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $this->database = new \mysqli('localhost', DBCredentials::DB_USERNAME, DBCredentials::DB_PASSWORD, self::DB_NAME);
            $this->createStmts();
        }
    }

    private function createStmts()
    {
        $this->findUserStmt      = $this->database->prepare("SELECT * FROM users WHERE user_name = ?");
        $this->insertUserStmt    = $this->database->prepare("INSERT INTO users (user_name, user_password) VALUE (?, ?)");
        $this->findNameStmt      = $this->database->prepare("SELECT * FROM users WHERE user_name = ?");
        $this->setCommentStmt    = $this->database->prepare("INSERT INTO comment (com_user, com_date, com_msg, com_recipe) VALUES (?, ?, ?, ?)");
        $this->getCommentStmt    = $this->database->prepare("SELECT * FROM comment WHERE com_recipe = ?");
        $this->deleteCommentStmt = $this->database->prepare("DELETE FROM comment WHERE com_id= ?");
    }

    public function registerUser($username, $password)
    {

        $this->insertUserStmt->bind_param('ss', $username, $password);
        $this->insertUserStmt->execute();
    }

    public function findUser($username, $password)
    {
        $this->createConnection();
        $this->findUserStmt->bind_param('s', $username);
        $this->findUserStmt->execute();

        $result = $this->findUserStmt->get_result();
        $row = $result->fetch_assoc();

        if (($result->num_rows > 0) And (password_verify($password, $row['user_password']))) {
            return true;
        } else {
            return false;
        }
    }

    public function usernameTaken($username)
    {
        $this->createConnection();
        $this->findNameStmt->bind_param('s', $username);
        $this->findNameStmt->execute();
        $result = ($this->findNameStmt->get_result()->num_rows) > 0;
        return $result;
    }

    public function setComment($author, $date, $message, $recipe)
    {
        $this->createConnection();
        $this->setCommentStmt->bind_param('ssss', $author, $date, $message, $recipe);
        $this->setCommentStmt->execute();
    }

    public function extractComments($recipe)
    {
        $this->createConnection();
        $this->getCommentStmt->bind_param('s', $recipe);
        $this->getCommentStmt->execute();
        $result = $this->getCommentStmt->get_result();
        $comments = $result;
        return $comments;
    }

    public function deleteComment($comId)
    {
        $this->createConnection();
        $this->deleteCommentStmt->bind_param('i', $comId);
        $this->deleteCommentStmt->execute();
    }
}