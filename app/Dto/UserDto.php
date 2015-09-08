<?php

namespace ManageMe\Dto;

use ManageMe\Models\User;
use ManageMe\Repositories\UserRepo;

class UserDto
{

    private $userRepo;

    public function __construct(UserRepo $userRepo) {
        $this->userRepo = $userRepo;
    }

    function findAll() {
        return User::all();
    }
}