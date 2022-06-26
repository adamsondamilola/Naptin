<?php
declare(strict_types=1);
namespace App\Services;

use App\Models\User;
use App\Http\GenerahResponse;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    public function __construct(
        private readonly GenerahResponse $response
    ) {
    }

    public function login(?User $user, string $password): GenerahResponse
    {
        if (!$user || ! Hash::check($password, $user->password)) {
            $this->response->success = false;
            $this->response->message = 'Invalid credentials';
        } else {
            $this->response->success = true;
            $this->response->message = 'Authentication successful';
            $this->response->data = $this->userDetailWithRoleAndPermissions($user);
        }
        return $this->response;
    }

    public function invalidateTokens(User $user): void
    {
        $user->tokens()->delete();
    }

    public function userDetailWithRoleAndPermissions(User $user): array
    {
        return  [
            'auth_token' => $this->createAuthToken($user),
            'user' => UserResource::make($user),
            'roles' => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()
        ];
    }

    private function createAuthToken(User $user): string
    {
        $permissions = [];
        return $user->createToken(config('auth.token_name'), $permissions)->plainTextToken;
    }
}
