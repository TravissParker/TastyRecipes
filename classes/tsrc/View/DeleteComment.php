<?php


namespace tsrc\View;

//Todo: This is not used anymore?
class DeleteComment extends RequestHandler
{
    private $comID;

    public function setComID($comID) {
        $this->comID = $comID;
    }

    protected function doExecute()
    {
        $ctrl = $this->getController();
        $ctrl->deleteComment($this->comID);
    }
}