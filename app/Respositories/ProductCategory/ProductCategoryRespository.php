<?php

namespace App\Respositories\ProductCategory;

use App\Models\ProductCategory;
use App\Respositories\BaseRespositories;

class ProductCategoryRespository extends BaseRespositories implements ProductCategoryRespositoryInterface
{
    public function getModel()
    {
        return ProductCategory::class;
    }

}
