<?php

namespace tsrc\View;


use tsrc\Util\Constants;

class GetUsername extends RequestHandler
{

    protected function doExecute()
    {
        $username = $this->session->get(Constants::USERNAME);
        $this->addVariable('jsonData', $username);
        $this->storeUser();

        return 'json-view';
    }
}