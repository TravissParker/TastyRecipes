<?php


namespace tsrc\View;

use tsrc\Util\Constants;

class Meatballs extends RecipeRequestHandler
{
    protected function doExecute()
    {
        $this->recipeRoutine();
        return Constants::MEATBALLS;
    }
}