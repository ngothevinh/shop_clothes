<?php

namespace App\Services\Order;

use App\Respositories\Order\OrderRespositoryInterface;
use App\Services\BaseService;

class OrderService extends  BaseService implements OrderServiceInterface
{
   public $repository;
   public function __construct(OrderRespositoryInterface $orderRespository)
   {
       $this->repository = $orderRespository;
   }
   public function getOrderByUserId($userId)
   {
       return $this->repository->getOrderByUserId($userId);
   }
}
