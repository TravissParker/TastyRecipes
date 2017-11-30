<?php


namespace tsrc\View;

use Id1354fw\View\AbstractRequestHandler;
use tsrc\Model\Shuttle;
use tsrc\Util\Constants;
//Todo: for errors we might want to use exceptions? Or should I leave that for report?
class Login extends AbstractRequestHandler
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
//        We must hash it right away!
//        $this->hPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $password;
    }

    public function setSubmitLogin($loginSubmit)
    {
        $this->loginBtnPressed = $loginSubmit;
    }
    //TODO: shuttle problem should be able to be solved by setting it in the session - maybe revisit the user object?
    protected function doExecute()
    {
        $ctrl = $this->session->get(Constants::CTRL);

        if (isset($this->loginBtnPressed)) {
            //Create and prepare shuttle for voyage
            $shuttle = new Shuttle();
            $shuttle->setUsername($this->username);
            $shuttle->setPassword($this->password);
            //Question: how can this (at times) be false?
            $ctrl->loginUser($shuttle);

            if ($shuttle->getOutcome() == false) {
                $this->addVariable('usernameError', $shuttle->getError('usernameError'));
                $this->addVariable('passwordError', $shuttle->getError('passwordError'));
                $this->addVariable('loginError', $shuttle->getError('userNotFound'));
                return 'Login';
            } else {
                $this->session->set(Constants::USERNAME, $shuttle->getUsername());
                $this->addVariable(Constants::USERNAME, $this->session->get(Constants::USERNAME));
                return 'index';
            }
        }
        return 'Login';
    }
}