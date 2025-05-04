<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Base\BaseRepository;


class UserRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new User());
    }
}
