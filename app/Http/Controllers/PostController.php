<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postRepo;
    protected $cateRepo;
    protected $userRepo;
    protected $cmtRepo;

    public function __construct(
        PostRepositoryInterface $postRepo,
        CategoryRepositoryInterface $cateRepo,
        UserRepositoryInterface $userRepo,
        CommentRepositoryInterface $cmtRepo,
    ) {
        $this->postRepo = $postRepo;
        $this->cateRepo = $cateRepo;
        $this->userRepo = $userRepo;
        $this->cmtRepo = $cmtRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.post_management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $image = '';
        if (isset($request->img)) {
            $image = time() . '_' . $request->img->getClientOriginalName();
            $request->file('img')->storeAs('public/storage', $image);
        }
        $this->postRepo->create([
            'title' => $request->title,
            'img' => $image,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postRepo->find($id);
        $comments = $this->cmtRepo->getAllCommentByPostId($id);

        return view('user.post_management.detail_post', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postRepo->find($id);

        if (Auth::check() && Auth::user()->role_id == config('app.role_admin')) {
            return view('admin.post_management.edit', compact('post'));
        } else {
            return view('user.post_management.edit', compact('post'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $image = '';
        if (isset($request->img)) {
            $image = time() . '_' . $request->img->getClientOriginalName();
            $request->file('img')->storeAs('public/storage', $image);
            $this->postRepo->update($id, [
                'title' => $request->title,
                'img' => $image,
                'content' => $request->content,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]);
        } else {
            $this->postRepo->update($id, [
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]);
        }
        if (Auth::user()->role_id == config('app.role_admin')) {
            return redirect()->route('posts.find_by_cate_id', $request->category_id);
        } else {
            return redirect()->route('home.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postRepo->delete($id);

        return redirect()->back();
    }

    public function findPostByCategoryId($cate_id)
    {
        $cate = $this->cateRepo->find($cate_id);
        $listPostByCateMess = 'List Post By Category: ' . $cate->name;
        $posts = $this->postRepo->getAllPostByCategoryId($cate_id);

        if (Auth::check() && Auth::user()->role_id == config('app.role_admin')) {
            return view('admin.category_management.list_post_by_cate', compact('listPostByCateMess', 'posts'));
        } else {
            return view('index', compact('listPostByCateMess', 'posts'));
        }
    }

    public function findPostByName(Request $request)
    {
        $posts = $this->postRepo->getAllPostByName($request->name);

        return view('index', compact('posts'));
    }

    public function findPostByUserId($user_id)
    {
        $posts = $this->postRepo->getAllPostByUserId($user_id);
        $listPostByUserMess = 'List Post By User Email: ' . $this->userRepo->find($user_id)->email;

        return view('index', compact('posts', 'listPostByUserMess'));
    }
}
