<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getAllUserIsNotAdmin();

    public function statisticUserByPost();

    public function statisticUserByCmt();
}
