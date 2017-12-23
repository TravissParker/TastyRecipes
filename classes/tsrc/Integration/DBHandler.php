<?php


namespace tsrc\Integration;

use tsrc\Util\Constants;

require 'C:/Server/data/DBCredentials.php';

class DBHandler
{
    const DB_NAME = 'tasty_recipes';
    const ONE_SECOND = 1;

    private $database;

    private $findUserStmt;
    private $insertUserStmt;
    private $findNameStmt;
    private $setCommentStmt;
    private $getCommentStmt;
    private $deleteCommentStmt;
    private $getNewestComIdStmt;

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
        $this->setCommentStmt    = $this->database->prepare("INSERT INTO comment (com_user, com_msg, com_recipe) VALUES (?, ?, ?)");
        $this->getCommentStmt    = $this->database->prepare("SELECT * FROM comment WHERE com_recipe = ?");
        $this->deleteCommentStmt = $this->database->prepare("DELETE FROM comment WHERE com_id = ?");
        $this->getNewestComIdStmt= $this->database->prepare("SELECT MAX(com_id) FROM comment WHERE com_recipe = ?");
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

    public function setComment($author, $message, $sourcePage)
    {
        $this->createConnection();
        $this->setCommentStmt->bind_param('sss', $author, $message, $sourcePage);
        $this->setCommentStmt->execute();
    }

    public function deleteComment($comId)
    {
        $this->createConnection();
        $this->deleteCommentStmt->bind_param('i', $comId);
        $this->deleteCommentStmt->execute();
    }

    public function extractComments($currentPage, $currentHigh)
    {
        $this->createConnection();
        $this->awaitNewComment($currentPage, $currentHigh);
        $this->getCommentStmt->bind_param('s', $currentPage);
        $this->getCommentStmt->execute();
        return $this->getCommentStmt->get_result();
    }

    public function getMaxComID($sourcePage)
    {
        $this->getNewestComIdStmt->bind_param('s', $sourcePage);
        $this->getNewestComIdStmt->execute();
        $result = $this->getNewestComIdStmt->get_result();
        $row = $result->fetch_array();
        return $row[0];
    }

    public function awaitNewComment($currentPage, $currentHigh) {
        \set_time_limit(0);
        $myfile = fopen("awaitNewCommentLog.txt", "a");
        fwrite($myfile, "\r\n---Before while---\r\n");
        $txt = "newestComment: " . $currentHigh . "\r\nMaxComID: " .  $this->getMaxComID($currentPage);
        fwrite($myfile, $txt);
        fwrite($myfile, "\r\n---------------------");

        while ($currentHigh >= $this->getMaxComID($currentPage)) {

            //Question: will the comparison matter
            $txt = "----INSIDE WHILE---";
            fwrite($myfile, $txt);
            $txt = "newestComment: " . $currentHigh . "\r\nMaxComID: " .  $this->getMaxComID($currentPage);
            fwrite($myfile, $txt);
            fwrite($myfile, "\r\n---------------------");

            \session_write_close();
            sleep(self::ONE_SECOND);
            \session_start();

        }
//        fwrite($myfile, "\r\nAFTER while\r\n");
//        $this->newestComment = $this->getMaxComID($currentPage);
//        $txt = "newestComment: " . $currentHigh . "\r\nMaxComID: " .  $this->getMaxComID($currentPage);
//        fwrite($myfile, $txt);
//        fwrite($myfile, "\r\n---------------------");
    }
}