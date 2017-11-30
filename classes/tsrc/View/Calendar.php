<?php

namespace tsrc\View;

use Id1354fw\View\AbstractRequestHandler;
use tsrc\Util\Constants;

class Calendar extends AbstractRequestHandler
{
    protected function doExecute()
    {
        if ($this->session->get(Constants::USERNAME) != null) {
            $this->addVariable(Constants::USERNAME, $this->session->get(Constants::USERNAME));
        }
        return 'Calendar';
    }
}