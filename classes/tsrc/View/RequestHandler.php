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
        $this->session->restart();
        $ctrl = $this->session->get(Constants::CTRL);

        if ($ctrl == null) {
            $ctrl = new Controller();
            return $ctrl;
        }
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
            $this->loggingOut = false;
        }
    }

    protected abstract function doExecute();
}