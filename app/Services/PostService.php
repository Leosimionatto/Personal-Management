<?php

namespace App\Services;

use App\Models\Post;

class PostService{

    /**
     * @var Post
     */
    protected $post;

    /**
     * PostService constructor.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Method to get all User Functions
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->post->all()->where('stcargo', '=', 'ati');
    }
}