<?php

namespace tsrc\Model;


class Comment
{
    private $author;
    private $date;
    private $msg;
    private $comID;

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    public function getMsg()
    {
        return $this->msg;
    }

    public function setComID($id)
    {
        $this->comID = $id;
    }

    public function getComID()
    {
        return $this->comID;
    }
}