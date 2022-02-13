<?php

namespace App\View\Composers;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\View\View;

class CategoryComposer
{
    protected $cateRepo;

    public function __construct(CategoryRepositoryInterface $cateRepo)
    {
        $this->cateRepo = $cateRepo;
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->cateRepo->getAll()->get());
    }
}
