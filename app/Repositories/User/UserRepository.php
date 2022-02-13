<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getAllUserIsNotAdmin()
    {
        return $this->model
            ->orderBy('updated_at', 'desc')
            ->where('role_id', config('app.role_user'))
            ->paginate(config('app.paginate'));
    }

    public function statisticUserByPost()
    {
        return $this->model
            ->select(DB::raw('users.email, count(*) as total_post'))
            ->join('posts', 'posts.user_id', 'users.id')
            ->groupBy(DB::raw('users.id, users.email'))
            ->orderBy('total_post', 'desc')
            ->get();
    }

    public function statisticUserByCmt()
    {
        return $this->model
            ->select(DB::raw('users.email, count(*) as total_cmt'))
            ->join('comments', 'comments.user_id', 'users.id')
            ->groupBy(DB::raw('users.id, users.email'))
            ->orderBy('total_cmt', 'desc')
            ->get();
    }
}
