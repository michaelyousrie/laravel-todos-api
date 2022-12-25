<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\UnifiedResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $user = User::query()->create(
            array_merge(
                $request->only('name', 'email'),
                ['password' => bcrypt($request->get('password'))]
            )
        );

        $user->api_token = $user->createToken('api')->plainTextToken;

        return UnifiedResponse::created(['user' => new UserResource($user)]);
    }

    public function login(Request $request)
    {
        $user = User::query()->where('email', $request->get('email'))->first();

        if (!$user or !Hash::check($request->get('password'), $user->password)) {
            return UnifiedResponse::notFound();
        }

        $user->tokens()->delete();

        $user->api_token = $user->createToken('api')->plainTextToken;

        return UnifiedResponse::success(['user' => new UserResource($user)]);
    }
}
