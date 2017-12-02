<?php


namespace tsrc\View;

class FirstPage extends RequestHandler
{

    protected function doExecute()
    {
       $this->logout(); //Checks if a logout has been requested, if yes then user is logged out, whenever a logout is requested the HTTP request is sent to the first page.
       $this->storeUser();
       return 'index';
    }
}