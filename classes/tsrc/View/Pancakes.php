<?php


namespace tsrc\View;

use tsrc\Util\Constants;

class Pancakes extends RecipeRequestHandler
{
    protected function doExecute()
    {
        $this->recipeRoutine();
        return Constants::PANCAKES;
    }
}