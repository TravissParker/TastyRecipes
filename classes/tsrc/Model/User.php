<?php

namespace tsrc\Model;


class User
{
    //Question: Should there be a class for signed in user and one for a user (that has relation to UserHandler) that can also represent a user entry in the database?

    private $username;

    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getUsername()
    {
        return $this->username;
    }



    public function setSigninStatus($state)
    {
        $this->signinStatus = $state;
    }

    public function getSigninStatus()
    {
        return $this->signinStatus;
    }
}