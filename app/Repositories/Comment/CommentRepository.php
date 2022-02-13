<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\BaseRepository;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function getModel()
    {
        return Comment::class;
    }

    public function getAllCommentByPostId($post_id)
    {
        return $this->model
            ->where('post_id', $post_id)
            ->get();
    }
}
