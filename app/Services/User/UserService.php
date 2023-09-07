<?php

namespace App\Services\User;

use App\Respositories\User\UserRespositoryInterface;
use App\Services\BaseService;

class UserService extends BaseService implements UserServiceInterface
{
    public $repository;
    public function __construct(UserRespositoryInterface $userRespository)
    {
        $this->repository = $userRespository;
    }
}
