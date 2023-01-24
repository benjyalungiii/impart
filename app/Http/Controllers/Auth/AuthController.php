<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UsersController;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use App\Utilities\Result;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\JWT;
use PHPOpenSourceSaver\JWTAuth\JWTAuth as JWTAuthJWTAuth;

class AuthController extends Controller
{
    /** @var Result */
    protected Result $result;

    /** @var User */
    protected User $user;

    protected UsersController $usersController;

    public function __construct(Result $result, User $user, UsersController $usersController)
    {
        $this->result = $result;
        $this->user = $user;
        $this->usersController = $usersController;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        $token = JWTAuth::attempt($credentials);

        if (!$token) {
            return $this->result->success([], 'Unauthorized access', false, 401);
        }

        $user = auth()->user();

        return $this->result->success([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request)
    {

        $validated =  $request->validated();

        $user = $this->usersController->insertUser($validated);

        $token = JWTAuth::fromUser($user);

        return $this->result->success(
            [
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ],
            'User created successfully',
        );
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $validated = $request->validated();

        #code ...

        return $this->result->success($this->user, 'This feature is still under development.');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $validated = $request->validated();

        #code ...

        return $this->result->success($this->user, 'This feature is still under development.');
    }

    public function verify(Request $request)
    {
        #code ...

        return $this->result->success($this->user, 'This feature is still under development.');
    }

    /**
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->invalidate(true);
        return $this->result->success(null, 'Successfully logged out');
    }

    /**
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->result->success([
            'user' => auth()->user(),
            'authorisation' => [
                'token' => auth()->refresh(true, true),
                'type' => 'bearer',
            ]
        ]);
    }
}
