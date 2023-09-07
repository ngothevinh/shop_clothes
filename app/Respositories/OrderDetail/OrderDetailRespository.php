<?php

namespace App\Respositories\OrderDetail;

use App\Models\OrderDetail;
use App\Respositories\BaseRespositories;

class OrderDetailRespository extends BaseRespositories implements OrderDetailRespositoryInterface
{
    public function getModel()
    {
        return OrderDetail::class;
    }
}
