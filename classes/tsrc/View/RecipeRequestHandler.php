<?php


namespace tsrc\View;

abstract class RecipeRequestHandler extends RequestHandler
{
    private $author;
    private $date;
    private $message;
    private $recipe;
    private $commentSubmitted;
    private $deleteComment;
    private $comID;

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setRecipePage($recipePage)
    {
        $this->recipe = $recipePage;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setCommentSubmit($commentSubmit)
    {
        $this->commentSubmitted = true;
    }

    public function setCommentDelete($delete)
    {
        $this->deleteComment = true;
    }

    public function setComId($id)
    {
        $this->comID = $id;
    }

    public function recipeRoutine()
    {
        $this->storeUser();

        $ctrl = $this->getController();

        if ($this->commentSubmitted == true) {
            $outcome = $ctrl->setComment($this->author, $this->date, $this->message, $this->recipe);
            $this->addVariable('commentPosted', $outcome);
            $this->commentSubmitted = false;
        }

        if ($this->deleteComment == true) {
            $ctrl->deleteComment($this->comID);
            $this->addVariable('commentDeleted', true);
            $this->deleteComment = false;
        }

        $comments = $ctrl->showComments($_SERVER['REQUEST_URI']);
        $this->addVariable('commentsList', $comments);
    }

    abstract protected function doExecute();
}