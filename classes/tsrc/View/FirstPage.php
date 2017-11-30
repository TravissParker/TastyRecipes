<?php

namespace tsrc\View;

use Id1354fw\View\AbstractRequestHandler;
use tsrc\Util\Constants;

class FirstPage extends AbstractRequestHandler
{
    private $loggedOut;

    public function setLogoutSubmit($logout)
    {
        //Fixme: Set a bool instead to make it neater
        $this->loggedOut = true;
        //bool signedOut
    }
    protected function doExecute()
    {
        if ($this->session->get(Constants::USERNAME) != null) {
            $this->addVariable(Constants::USERNAME, $this->session->get(Constants::USERNAME));
        }

        //Fixme: When we press logout, the nav bar should update right away, which it doesn't
        if ($this->loggedOut == true) {
            $this->session->invalidate(); //Question: doesn't this one make the USERNAME null...
            $this->session->restart(); //Fixme: Is this one really needed?
            $this->loggedOut = false; // It worked without reseting this...
        }
        return 'index';
    }
}