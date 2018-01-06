<?php

namespace tsrc\View;

//question: is recipe routine useless now?
class PostComment extends RequestHandler
{
    private $author;
    private $post;
    private $currentPage;

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setCurrentPage($recipePage)
    {
        $this->currentPage = $recipePage;
    }

    public function setPost($post)
    {
        $this->post = $post;
    }

    protected function doExecute()
    {
        $ctrl = $this->getController();
        $ctrl->setComment($this->author, $this->post, $this->currentPage);
    }

}