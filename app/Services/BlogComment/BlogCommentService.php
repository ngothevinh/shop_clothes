<?php

namespace App\Services\BlogComment;

use App\Respositories\BlogComment\BlogCommentRepositoryInterface;
use App\Services\BaseService;

class BlogCommentService extends BaseService implements BlogCommentServiceInterface
{
    public $repository;
    public function __construct(BlogCommentRepositoryInterface $blogCommentRepository)
    {
        $this->repository = $blogCommentRepository;
    }
}
