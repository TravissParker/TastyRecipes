<?php


namespace tsrc\View;

class Pancakes extends RecipeRequestHandler
{
    protected function doExecute()
    {
        $this->recipeRoutine();
        return 'Pancakes';
    }
}