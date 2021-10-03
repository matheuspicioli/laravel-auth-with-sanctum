<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AuthService
{
    // @TODO Create a DTO for $registerData and $loginData

    public function register(array $registerData): array
    {
        DB::beginTransaction();

        try {
            $user = (new User)->fill($registerData);
            $user->password = bcrypt($registerData['password']);
            $user->save();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return [
            'name' => $user->name,
            'email' => $user->email,
            'token' => $this->createToken($user)
        ];
    }

    public function login(array $loginData): array
    {
        $user = User::where('email', $loginData['email'])->first();

        if (!$user || !auth()->attempt($loginData)) {
            throw new \Exception('Unauthorized', Response::HTTP_UNAUTHORIZED);
        }

        return [
            'token' => $this->createToken($user)
        ];
    }

    public function createToken(User $user): string
    {
        // @TODO: create validation to invalidate previous tokens
        return $user->createToken(env('APP_NAME'))->plainTextToken;
    }
}
