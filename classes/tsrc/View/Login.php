<?php

namespace tsrc\View;

use tsrc\Exceptions\MissingInputException;
use tsrc\Exceptions\CredentialsException;
use tsrc\Model\Shuttle;
use tsrc\Util\Constants;

class Login extends RequestHandler
{
    private $username;
    private $password;
    private $loginBtnPressed;

    public function setUserName($username)
    {
        $this->username = $username;
    }

    public function setUserPassword($password)
    {
        $this->password = $password;
    }

    public function setSubmitLogin($loginSubmit)
    {
        $this->loginBtnPressed = $loginSubmit;
    }

    protected function doExecute()
    {
        $ctrl = $this->getController();

        if (isset($this->loginBtnPressed)) {
            $shuttle = new Shuttle();
            $shuttle->setUsername($this->username);
            $shuttle->setPassword($this->password);

            try {
                $ctrl->loginUser($shuttle);
                $this->session->set(Constants::USERNAME, $shuttle->getUsername());
                $this->storeUser();
                return Constants::INDEX;
            } catch (MissingInputException $e) {
                $this->addVariable('usernameError', $e->getMessage());
                $this->addVariable('passwordError', $e->getMessage());
                return Constants::LOGIN;
            } catch (CredentialsException $e) {
                $this->addVariable('loginError', $e->getMessage());
                return Constants::LOGIN;
            }
        }
        return Constants::LOGIN;
    }
}