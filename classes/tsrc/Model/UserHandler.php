<?php

namespace tsrc\Model;


use tsrc\Exceptions\CredentialsException;
use tsrc\Exceptions\MissingInputException;
use tsrc\Exceptions\PasswordException;
use tsrc\Exceptions\UsernameException;
use tsrc\Integration\DBHandler;
use tsrc\Util\Constants;
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
        try {
            if (InputValidator::fieldIsEmpty($shuttle->getUsername())) {
                throw new MissingInputException(Constants::REQUIRED_FIELD);
            }
            if (InputValidator::fieldIsEmpty($shuttle->getPassword())) {
                throw new MissingInputException(Constants::REQUIRED_FIELD);
            }
        } catch (MissingInputException $e) {
            throw $e;
        }

    }

    public function loginUser($shuttle)
    {
        try {
            $this->routineValidation($shuttle);
            $numRows = $this->dbHandler->findUser($shuttle->getUsername(), $shuttle->getPassword());
            if ($numRows == false) {
                throw new CredentialsException("Incorrect username and/or password");
            }
        } catch (MissingInputException | CredentialsException $e) {
            throw $e;
        }
    }
    public function registerUser($shuttle)
    {
        $shuttle->setUsername(InputValidator::vetInput($shuttle->getUsername()));

        try {
            $this->routineValidation($shuttle);
            if (InputValidator::fieldIsEmpty($shuttle->getPasswordR())) {
                throw new MissingInputException(Constants::REQUIRED_FIELD);
            }
            if (InputValidator::stringsNotEqual($shuttle->getpassword(), $shuttle->getpasswordR())) {
                throw new PasswordException("The passwords doesn't match");
            }

            $res = $this->dbHandler->usernameTaken($shuttle->getUsername());
            if ($res == true) {
                throw new UsernameException("This username is already in use");
            }

            $this->dbHandler->registerUser($shuttle->getUsername(), password_hash($shuttle->getPassword(), PASSWORD_DEFAULT));

        } catch (MissingInputException | PasswordException | UsernameException $e) {
            throw $e;
        }
    }
}

