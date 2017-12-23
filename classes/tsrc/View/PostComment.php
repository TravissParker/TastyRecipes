<?php

namespace tsrc\View;

//question: is recipe routine useless now?
class PostComment extends RequestHandler
{
    private $author;
    private $message;
    private $recipe;

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setRecipePage($recipePage)
    {
        $this->recipe = $recipePage;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    protected function doExecute()
    {
        $ctrl = $this->getController();
        $ctrl->setComment($this->author, $this->message, $this->recipe);
    }

}