<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthService
{
   public function login(array $credentials): array
    {
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Generate the token
        $token = $user->createToken('admin-token')->plainTextToken;

        // Return both the token and the user object
        return [
            'token' => $token,
            'user' => $user
        ];
    }

    public function logout(User $user): void
    {
        // Revoke the current token being used
        $user->currentAccessToken()->delete;
    }

    public function updatePassword(User $user, string $newPassword): bool
    {
        return $user->update([
            'password' => Hash::make($newPassword)
        ]);
    }
}
