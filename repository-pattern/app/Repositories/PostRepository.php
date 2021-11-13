<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAll()
    {
        $post = $this->post->get();

        return $post;
    }

    public function findById($id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        return $post;
    }
}
