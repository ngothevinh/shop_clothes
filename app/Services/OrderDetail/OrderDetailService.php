<?php

namespace App\Services\OrderDetail;

use App\Respositories\OrderDetail\OrderDetailRespositoryInterface;
use App\Services\BaseService;

class OrderDetailService extends BaseService implements OrderDetailServiceInterface
{
    public $repository;
    public function __construct( OrderDetailRespositoryInterface $orderDetailRespository)
    {
        $this->repository = $orderDetailRespository;
    }
}
