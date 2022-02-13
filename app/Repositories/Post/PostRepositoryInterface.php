<?php

namespace App\Repositories\Post;

use App\Repositories\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function getAllPostByCategoryId($cate_id);

    public function getAllPostByUserId($user_id);

    public function getAllPostByName($name);

    public function statisticPostByCmt();
}
