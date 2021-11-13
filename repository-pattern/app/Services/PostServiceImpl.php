<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostServiceImpl implements PostService
{
    protected $postRepo;
    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function getAll()
    {
        return $this->postRepo->getAll();
    }
}
