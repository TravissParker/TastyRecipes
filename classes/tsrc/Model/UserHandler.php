<?php

namespace tsrc\Model;


use tsrc\Integration\DBHandler;
use tsrc\Util\InputValidator;

class UserHandler
{
    private $dbHandler;

    public function __construct()
    {
        $this->dbHandler = new DBHandler();
    }

    private function routineValidation($shuttle)
    {
        if (InputValidator::fieldIsEmpty($shuttle->getUsername())) {
            $shuttle->setErrorMsg('usernameError', 'This field is required');
        }
        if (InputValidator::fieldIsEmpty($shuttle->getPassword())) {
            $shuttle->setErrorMsg('passwordError', 'This field is required');
        }
    }

    public function loginUser($shuttle)
    {
        $this->routineValidation($shuttle);

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
    public function registerUser($shuttle)
    {

        $shuttle->setUsername(InputValidator::vetInput($shuttle->getUsername()));

        $this->routineValidation($shuttle);

        if (InputValidator::controlCharacters($shuttle->getUsername())) {
            $shuttle->setErrorMsg('controlChar', 'Control characters were found in the username');
        }
        if (InputValidator::controlCharacters($shuttle->getPassword())) {
            $shuttle->setErrorMsg('controlChar', 'Control characters were found in the password');
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
                $this->dbHandler->registerUser($shuttle->getUsername(), password_hash($shuttle->getPassword(), PASSWORD_DEFAULT));
                $shuttle->setOutcome(true);
            }
        }
    }
}

