<?php


namespace tsrc\View;

use tsrc\Exceptions\MissingInputException;
use tsrc\Exceptions\PasswordException;
use tsrc\Exceptions\UsernameException;
use tsrc\Model\Shuttle;
use tsrc\Util\Constants;

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

            try {
                $ctrl->registerUser($this->shuttle);
                return Constants::LOGIN;
            } catch (MissingInputException $e) {
                $this->addVariable('usernameError', $e->getMessage());
                $this->addVariable('passwordError', $e->getMessage());
                $this->addVariable('passwordErrorR', $e->getMessage());
                return Constants::SIGNUP;
            } catch (PasswordException $e) {
                $this->addVariable('passwordMismatch', $e->getMessage());
                return Constants::SIGNUP;
            } catch (UsernameException $e) {
                $this->addVariable('usernameError', $e->getMessage());
                return Constants::SIGNUP;
            }
            finally {
                $this->shuttle = null; //Since password is stored here we set it too null just to be sure
            }
        }
        return Constants::SIGNUP;
    }
}