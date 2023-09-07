<?php

namespace App\Services\Brand;

use App\Respositories\Brand\BrandRespositoryInterface;
use App\Services\BaseService;

class BrandService extends BaseService implements BrandServiceInterface
{
   public $repository;
   public function __construct(BrandRespositoryInterface $brandRespository)
   {
       $this->repository = $brandRespository;
   }
}
