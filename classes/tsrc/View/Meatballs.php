<?php


namespace tsrc\View;

class Meatballs extends RecipeRequestHandler
{
    protected function doExecute()
    {
        $this->recipeRoutine();
        return 'Meatballs';
    }
}