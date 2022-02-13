<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function getModel()
    {
        return Post::class;
    }

    public function getAllPostByCategoryId($cate_id)
    {
        return $this->model
            ->where('category_id', $cate_id)
            ->paginate(config('app.paginate'));
    }

    public function getAllPostByUserId($user_id)
    {
        return $this->model
            ->where('user_id', $user_id)
            ->paginate(config('app.paginate'));
    }

    public function getAllPostByName($name)
    {
        return $this->model
            ->where('title', 'like',  '%' . $name . '%')
            ->paginate(config('app.paginate'));
    }

    public function statisticPostByCmt()
    {
        return $this->model
            ->select(DB::raw('posts.title, count(*) as total_cmt'))
            ->join('comments', 'comments.post_id', 'posts.id')
            ->groupBy(DB::raw('posts.id, posts.title'))
            ->orderBy('total_cmt', 'desc')
            ->get();
    }
}
