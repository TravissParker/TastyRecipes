<?php

namespace tsrc\View;


use Id1354fw\View\AbstractRequestHandler;
use tsrc\Util\Constants;

class Meatballs extends AbstractRequestHandler
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
    //Delete

    public function setCommentDelete($delete)
    {
        $this->deleteComment = true;
    }

    public function setComId($id)
    {
        $this->comID = $id;
    }

    protected function doExecute()
    {
        if ($this->session->get(Constants::USERNAME) != null) {
            $this->addVariable(Constants::USERNAME, $this->session->get(Constants::USERNAME));
        }
        $ctrl = $this->session->get(Constants::CTRL);

        if ($this->commentSubmitted == true) {
            $ctrl->setComment($this->author, $this->date, $this->message, $this->recipe);
            $this->addVariable('commentPosted', true);
            $this->commentSubmitted = false;
        }

        if ($this->deleteComment == true) {
            $ctrl->deleteComment($this->comID);
            $this->addVariable('commentDeleted', true);
            $this->deleteComment = false;
        }

        $comments = $ctrl->showComments($_SERVER['REQUEST_URI']);
        $this->addVariable('commentsList', $comments);


        //Question: this is the only diff from Pancakes
        return 'Meatballs';
    }
}