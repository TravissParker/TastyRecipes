<?php

namespace tsrc\View;

use Id1354fw\View\AbstractRequestHandler;
use tsrc\Model\Shuttle;
use tsrc\Util\Constants;
//Question: How to solve the shuttle being null problem: if construct isn't run then shuttle is gone? This must be understood. But now it works!?! Arggghh!
class Signup extends AbstractRequestHandler
{
    private $shuttle;
    private $signupBtnFromLogin;
    private $registerBtn;

    public function __construct()
    {
        parent::__construct();
        $this->shuttle = new Shuttle();
    }

    public function setSignup($signup) {
        $this->signupBtnFromLogin = $signup;
    }

    public function setNewUsername($newUsername) {
        $this->shuttle->setUsername($newUsername);
    }

    public function setNewPassword($newPassword) {
        $this->shuttle->setPassword($newPassword);
    }

    public function setNewPasswordR($newPasswordR) {
        $this->shuttle->setPasswordR($newPasswordR);
    }

    public function setRegisterSubmit($registerBtn) {
        $this->registerBtn = $registerBtn;
    }
    //Todo: passwords still needs to hashed, and de-hashed in login... where to do - where does this abstraction belong?
    protected function doExecute()
    {
        if ($this->session->get(Constants::USERNAME) != null) {
            $this->addVariable(Constants::USERNAME, $this->session->get(Constants::USERNAME));
        }

        $ctrl = $this->session->get(Constants::CTRL);
        if (isset($this->registerBtn)) {
            $ctrl->registerUser($this->shuttle);
            if ($this->shuttle->getOutcome() == false) {
                $this->addVariable('usernameError', $this->shuttle->getError('usernameError'));
                $this->addVariable('passwordError', $this->shuttle->getError('passwordError'));
                $this->addVariable('passwordErrorR', $this->shuttle->getError('passwordErrorR'));
                $this->addVariable('passwordMismatch', $this->shuttle->getError('passwordMismatch'));
                return 'Signup';
            } else {
                $this->addVariable('signupSuccess', true);
                return 'Login';
            }
        }
        return 'Signup';
    }
}