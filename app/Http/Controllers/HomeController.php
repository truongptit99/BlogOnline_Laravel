<?php

namespace App\Http\Controllers;

use App\Repositories\Post\PostRepositoryInterface;

class HomeController extends Controller
{
    protected $postRepo;

    public function __construct(PostRepositoryInterface $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function index()
    {
        $posts = $this->postRepo->getAll()->paginate(config('app.paginate'));

        return view('index', compact('posts'));
    }
}
