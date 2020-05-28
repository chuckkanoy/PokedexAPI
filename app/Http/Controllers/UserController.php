<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Add new user to table if possible
     *
     * @param RegisterRequest $request
     */
    public function store(RegisterRequest $request)
    {
        return $this->userRepository->store($request);
    }
}
