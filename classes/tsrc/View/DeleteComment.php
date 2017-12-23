<?php


namespace tsrc\View;


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