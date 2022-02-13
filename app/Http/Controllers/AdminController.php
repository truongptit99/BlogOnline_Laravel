<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class AdminController extends Controller
{
    protected $cateRepo;
    protected $postRepo;
    protected $userRepo;

    public function __construct(
        CategoryRepositoryInterface $cateRepo,
        PostRepositoryInterface $postRepo,
        UserRepositoryInterface $userRepo,
    ) {
        $this->cateRepo = $cateRepo;
        $this->postRepo = $postRepo;
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        return view('admin.layout.layout');
    }

    public function statistic()
    {
        $listCateSortByPost = $this->cateRepo->statisticCategoryByPost();
        $listUserSortByPost = $this->userRepo->statisticUserByPost();
        $listUserSortByCmt = $this->userRepo->statisticUserByCmt();
        $listPostSortByCmt = $this->postRepo->statisticPostByCmt();

        return view('admin.statistic', compact([
            'listCateSortByPost',
            'listUserSortByPost',
            'listUserSortByCmt',
            'listPostSortByCmt',
        ]));
    }
}
