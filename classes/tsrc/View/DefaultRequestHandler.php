<?php


namespace tsrc\View;

class DefaultRequestHandler extends RequestHandler
{
    protected function doExecute()
    {
        $this->session->restart();
        \header('Location: /TastyRecipes/tsrc/View/FirstPage');
    }
}
