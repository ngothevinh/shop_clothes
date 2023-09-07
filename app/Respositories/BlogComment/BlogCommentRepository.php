<?php

namespace App\Respositories\BlogComment;

use App\Models\BlogComment;
use App\Respositories\BaseRespositories;

class BlogCommentRepository extends BaseRespositories implements BlogCommentRepositoryInterface
{
    public function getModel()
    {
        return BlogComment::class;
    }

}
