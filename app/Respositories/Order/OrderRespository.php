<?php

namespace App\Respositories\Order;

use App\Models\Order;
use App\Respositories\BaseRespositories;

class OrderRespository extends BaseRespositories implements OrderRespositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }
    public function getOrderByUserId($userId)
    {
        return $this->model->where('user_id',$userId)->get();
    }

}
