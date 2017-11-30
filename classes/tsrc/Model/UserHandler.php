<?php

namespace tsrc\Model;


use tsrc\Integration\DBHandler;

//Question: Should include fields for username, pw, and make this object focus on the signed in user and what can be done with shlee. But how would the later work, I suppose we could getUsername() through conroller - sign in already have that info... and maybe it is better to just addVariable for username?
class UserHandler
{
    private $user;
    private $dbHandler;
//    private $InputValidator; // Since methods are static I don't think we need this?

    public function __construct()
    {
        $this->dbHandler = new DBHandler();
    }

    public function loginUser($shuttle)
    {
        if (InputValidator::fieldIsEmpty($shuttle->getUsername())) {
            $shuttle->setErrorMsg('usernameError', 'This field is required');
        }
        if (InputValidator::fieldIsEmpty($shuttle->getPassword())) {
            $shuttle->setErrorMsg('passwordError', 'This field is required');
        }
        if ($shuttle->checkForErrors()) {
            $shuttle->setOutcome(false);
        } else {//If no errors are found this far, then we go on
            $numRows = $this->dbHandler->findUser($shuttle->getUsername(), $shuttle->getPassword());
            if ($numRows == false) {
                $shuttle->setErrorMsg('userNotFound', "Incorrect username and/or password");
            } else {
                $shuttle->setOutcome(true);
            }
        }
    }
    //Todo: there is duplicated code in these functions... also these if statements show we should do something more clever.
    public function registerUser($shuttle)
    {
        if (InputValidator::fieldIsEmpty($shuttle->getUsername())) {
            $shuttle->setErrorMsg('usernameError', 'This field is required');
        }
        if (InputValidator::fieldIsEmpty($shuttle->getPassword())) {
            $shuttle->setErrorMsg('passwordError', 'This field is required');
        }
        if (InputValidator::fieldIsEmpty($shuttle->getPasswordR())) {
            $shuttle->setErrorMsg('passwordErrorR', 'This field is required');
        }
        if (InputValidator::stringsNotEqual($shuttle->getpassword(), $shuttle->getpasswordR())) {
            $shuttle->setErrorMsg('passwordMismatch', "The passwords doesn't match");
        }

        if ($shuttle->checkForErrors()) {
            $shuttle->setOutcome(false);
        } else {
            $res = $this->dbHandler->usernameTaken($shuttle->getUsername());
            if ($res == true) { //If there is a hit this will render true
                $shuttle->setErrorMsg('usernameError', "This username is already in use");
                $shuttle->setOutcome(false);
            } else {
                $this->dbHandler->registerUser($shuttle->getUsername(), $shuttle->getPassword());
                $shuttle->setOutcome(true);
            }
        }
    }
}

