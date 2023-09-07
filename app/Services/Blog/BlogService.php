<?php

namespace App\Services\Blog;

use App\Respositories\Blog\BlogRepositoryInterface;
use App\Services\BaseService;

class BlogService extends BaseService implements BlogServiceInterface
{
    public $repository;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->repository = $blogRepository;
    }
    public function getLatestBlogs($limit = 3){
        return $this->repository->getLatestBlogs($limit);
    }
}
