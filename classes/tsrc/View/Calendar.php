<?php


namespace tsrc\View;

class Calendar extends RequestHandler
{
    protected function doExecute()
    {
        $this->storeUser();
        return 'Calendar';
    }
}