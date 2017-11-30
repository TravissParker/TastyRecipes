<?php

namespace tsrc\Model;

//Question: in which namespace should we place this?
class Shuttle
{
    private $username;
    private $password;
    private $passwordR;
    private $errorMsg;
    private $outcome;

    public function __construct() {
        $this->errorMsg = Array("usernameError"=>"",
                          "passwordError"=>"",
                          "userNotFound"=>"",
                          "passwordRError"=>"",
                          "passwordMismatch"=>"");
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPasswordR($passwordR) {
        $this->passwordR = $passwordR;
    }

    public function getPasswordR() {
        return $this->passwordR;
    }

    public function setErrorMsg($index, $msg) {
        $this->errorMsg[$index] = $msg;
    }

    public function getError($index) {
        return $this->errorMsg[$index];
    }

    public function getArray() {
        return $this->errorMsg;
    }

    public function checkForErrors() {
        foreach ($this->errorMsg as $key=>$value) {
            if (!empty($value)) {
                return true;
            }
        }
    }

    public function setOutcome($result) {
        $this->outcome = $result;
    }

    public function getOutcome() {
        return $this->outcome;
    }

}