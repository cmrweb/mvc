<?php
use cmrweb\DBmvc;

class IndexModel extends DBmvc
{
    private $post;
    public function setPost(?array $post)
    {
        $this->post = $post;
        return $this;
    }
    public function getPost(): ?array
    {
        $this->post = parent::select("*","post");
        return $this->post;
    }
}

