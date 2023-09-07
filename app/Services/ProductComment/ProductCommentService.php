<?php

namespace App\Services\ProductComment;

use App\Respositories\ProductComment\ProductCommentRespositoryInterface;
use App\Services\BaseService;

class ProductCommentService extends BaseService implements ProductCommentServiceInterface
{
    public $repository;
    public function __construct(ProductCommentRespositoryInterface $productCommentRespository)
    {
        $this->repository = $productCommentRespository;
    }
}
