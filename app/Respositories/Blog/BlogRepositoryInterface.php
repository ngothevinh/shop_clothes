<?php

namespace App\Respositories\Blog;

use Dotenv\Repository\RepositoryInterface;

interface BlogRepositoryInterface extends RepositoryInterface
{
    public function getLatestBlogs($limit = 3);
}
