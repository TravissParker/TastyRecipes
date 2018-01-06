<?php

namespace tsrc\View;


use tsrc\Util\Constants;

class GetComments extends RequestHandler
{
    private $currentPage;
    private $currentHigh;

    public function setCurrentPage($currentPage) {
        $this->currentPage = $currentPage;
    }

    public function setCurrentHigh($currentHigh) {
        $this->currentHigh = $currentHigh;
    }

    protected function doExecute()
    {
        $ctrl = $this->getController();
        $comJSON = $ctrl->getComments($this->currentPage, $this->currentHigh);
        $this->addVariable(Constants::JSON_DATA, $comJSON);
        $this->storeUser();

        return Constants::JSON_VIEW;
    }
}