<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Entities\UserEntity;
use App\Modules\User\Models\User;
use App\Modules\User\Requests\LoginRequest;
use App\Modules\User\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /** @var UserEntity */
    private UserEntity $userEntity;

    /**
     * @param UserEntity $userEntity
     */
    public function __construct(UserEntity $userEntity)
    {
        $this->userEntity = $userEntity;
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                                        'message' => 'Invalid login details'
                                    ], 401);
        }

        try {
            /** @var User $user */
            $user = $this->userEntity->findBy('email', $request['email']);
        } catch (\Exception $exception) {
            return response()->json([
                                        'message' => 'Invalid login details'
                                    ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                                    'access_token' => $token,
                                    'token_type' => 'Bearer',
                                ]);
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = $this->userEntity->create($request->toArray());

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                                    'access_token' => $token,
                                    'token_type' => 'Bearer',
                                ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function me(Request $request)
    {
        return $request->user();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['success' => true]);
    }
}
