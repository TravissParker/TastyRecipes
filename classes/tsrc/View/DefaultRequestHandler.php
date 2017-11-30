<?php

namespace tsrc\View;

use Id1354fw\View\AbstractRequestHandler;
use tsrc\Controller\Controller;
use tsrc\Model\User;
use tsrc\Util\Constants;


class DefaultRequestHandler extends AbstractRequestHandler
{
    protected function doExecute()
    {
        $this->session->restart();

        if ($this->session->get(Constants::USERNAME) != null) {
            $this->addVariable(Constants::USERNAME, $this->session->get(Constants::USERNAME));
        }

        $this->session->set(Constants::CTRL, new Controller());
//        $this->session->set(Constants::USER, new User());
        \header('Location: /TastyRecipes/tsrc/View/FirstPage');
    }
}
