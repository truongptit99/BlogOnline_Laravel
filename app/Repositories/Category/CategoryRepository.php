<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function statisticCategoryByPost()
    {
        return $this->model
            ->select(DB::raw('categories.name, count(*) as total_post'))
            ->join('posts', 'posts.category_id', 'categories.id')
            ->groupBy(DB::raw('categories.id, categories.name'))
            ->orderBy('total_post', 'desc')
            ->get();
    }
}
