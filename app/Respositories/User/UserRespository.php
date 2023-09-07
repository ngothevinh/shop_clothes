<?php

namespace App\Respositories\User;

use App\Models\User;
use App\Respositories\BaseRespositories;

class UserRespository extends BaseRespositories implements UserRespositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
}
