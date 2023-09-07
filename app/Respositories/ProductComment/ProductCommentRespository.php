<?php

namespace App\Respositories\ProductComment;

use App\Models\ProductComment;
use App\Respositories\BaseRespositories;

class ProductCommentRespository extends BaseRespositories implements ProductCommentRespositoryInterface
{
    public function getModel()
    {
        return ProductComment::class;
    }
}
