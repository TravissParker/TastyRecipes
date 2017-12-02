<?php


namespace tsrc\View;

use tsrc\Model\Shuttle;
class Signup extends RequestHandler
{
    private $shuttle;
    private $signupBtnFromLogin;
    private $submitRegistration;

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
        $this->submitRegistration = true;
    }
    protected function doExecute()
    {
        $this->storeUser();

        $ctrl = $this->getController();
        if ($this->submitRegistration == true) {
            $this->submitRegistration = false;
            $ctrl->registerUser($this->shuttle);
            if ($this->shuttle->getOutcome() == false) {
                $this->addVariable('usernameError', $this->shuttle->getError('usernameError'));
                $this->addVariable('passwordError', $this->shuttle->getError('passwordError'));
                $this->addVariable('passwordErrorR', $this->shuttle->getError('passwordErrorR'));
                $this->addVariable('passwordMismatch', $this->shuttle->getError('passwordMismatch'));
                $this->addVariable('controlChar', $this->shuttle->getError('controlChar'));
                $this->shuttle = null; //Since password is stored here we set it too null just to be sure
                return 'Signup';
            } else {
                $this->addVariable('signupSuccess', true);
                $this->shuttle = null; //Since password is stored here we set it too null just to be sure
                return 'Login';
            }
        }
        return 'Signup';
    }
}