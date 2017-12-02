<?php


namespace tsrc\View;

use Id1354fw\View\AbstractRequestHandler;
use tsrc\Controller\Controller;
use tsrc\Util\Constants;

abstract class RequestHandler extends AbstractRequestHandler
{

    private $loggingOut;

    public function getController()
    {
        $this->session->restart(); //Hmm without this line we get error: called without server...
        $ctrl = $this->session->get(Constants::CTRL);

        if ($ctrl == null) {
            $ctrl = new Controller();
            return $ctrl;
        }
//        $this->session->set(Constants::CTRL, $ctrl);
        return $ctrl;
    }

    public function storeUser()
    {
        if ($this->session->get(Constants::USERNAME) != null) {
            $this->addVariable(Constants::USERNAME, $this->session->get(Constants::USERNAME));
        }
    }

    public function setLogoutSubmit()
    {
        $this->loggingOut = true;
    }

    public function logout()
    {
        if ($this->loggingOut == true) {
            $this->session->invalidate();
            $this->session->restart();
            $this->loggingOut = false; // It worked without resetting this...
        }
    }

    protected abstract function doExecute();
}