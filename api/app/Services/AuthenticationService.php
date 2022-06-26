<?php
declare(strict_types=1);
namespace App\Services;

use App\Models\User;
use App\Http\GenerahPayload;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    public function __construct(
        private readonly GenerahPayload $payload
    ) {
    }

    public function login(?User $user, string $password): GenerahPayload
    {
        if (!$user || ! Hash::check($password, $user->password)) {
            $this->payload->setPayload(false, 'Invalid credentials');
        } else {
            $this->payload->setPayload(true, 'Authentication successful', $this->userDetailWithRoleAndPermissions($user));
        }
        return $this->payload;
    }

    public function invalidateTokens(User $user): GenerahPayload
    {
        $user->tokens()->delete();
        $this->payload->setPayload(true, 'Logout successful');
        return $this->payload;
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
