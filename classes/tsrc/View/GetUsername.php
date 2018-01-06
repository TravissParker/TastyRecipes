<?php

namespace tsrc\View;


use tsrc\Util\Constants;

class GetUsername extends RequestHandler
{

    protected function doExecute()
    {
        $username = $this->session->get(Constants::USERNAME);
        $this->addVariable(Constants::JSON_DATA, $username);
        $this->storeUser();

        return Constants::JSON_VIEW;
    }
}