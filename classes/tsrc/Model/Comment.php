<?php

namespace tsrc\Model;


class Comment implements \JsonSerializable
{
    private $author;
    private $msg;
    private $comID;
    private $trueWriter = false;

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
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

    public function jsonSerialize() {
        $jsonObj = new \stdClass;
        $jsonObj->author = \json_encode($this->author);
        $jsonObj->msg = \json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        $jsonObj->comID = \json_encode($this->comID);
        $jsonObj->trueWriter = \json_encode($this->trueWriter);
        return $jsonObj;
    }
}