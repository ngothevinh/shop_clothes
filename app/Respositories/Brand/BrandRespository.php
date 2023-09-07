<?php

namespace App\Respositories\Brand;

use App\Models\Brand;
use App\Respositories\BaseRespositories;
use App\Services\Brand\BrandServiceInterface;

class BrandRespository extends BaseRespositories implements BrandRespositoryInterface
{
    public function getModel()
    {
        return Brand::class;
    }
}
