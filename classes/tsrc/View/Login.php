<?php

namespace tsrc\View;

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
            $ctrl->loginUser($shuttle);

            if ($shuttle->getOutcome() == false) {
                $this->addVariable('usernameError', $shuttle->getError('usernameError'));
                $this->addVariable('passwordError', $shuttle->getError('passwordError'));
                $this->addVariable('loginError', $shuttle->getError('userNotFound'));
                $this->addVariable('controlChar', $shuttle->getError('controlChar'));
                return 'Login';
            } else {
                $this->session->set(Constants::USERNAME, $shuttle->getUsername());
                $this->storeUser();
                return 'index';
            }
        }
        return 'Login';
    }
}