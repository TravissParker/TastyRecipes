<?php


namespace tsrc\View;

class FirstPage extends RequestHandler
{

    protected function doExecute()
    {
       $this->logout(); //Checks if a logout has been requested, if yes then user is logged out
       $this->storeUser();
       return 'index';
    }
}