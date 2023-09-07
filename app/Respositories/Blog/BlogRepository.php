<?php

namespace App\Respositories\Blog;

use App\Models\Blog;
use App\Respositories\BaseRespositories;

class BlogRepository extends BaseRespositories implements BlogRepositoryInterface
{
    public function getModel()
    {
        return Blog::class;
    }

    public function has(string $name)
    {
        // TODO: Implement has() method.
    }
    public function get(string $name)
    {
        // TODO: Implement get() method.
    }
    public function set(string $name, string $value)
    {
        // TODO: Implement set() method.
    }
    public function clear(string $name)
    {
        // TODO: Implement clear() method.
    }

    public function getLatestBlogs($limit = 3){
        return $this->model->orderBy('id','desc')
            ->limit($limit)
            ->get();
    }
}
