<?php

namespace ManageMe\Http\Controllers;

use ManageMe\Dto\UserDto;
use ManageMe\Http\Requests;

class UserController extends Controller
{
    private $userDto;

    function __construct(UserDto $userDto) {
        $this->userDto = $userDto;
    }

    function all() {
        return $this->userDto->findAll();
    }
}
