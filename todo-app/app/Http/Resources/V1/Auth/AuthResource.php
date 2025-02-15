<?php

namespace App\Http\Resources\V1\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $auth = auth()->user();

        return [
            'profile' => [
                'id' => $auth->id,
                'name' => $auth->name,
                'email' => $auth->email,
                'role' => $auth->role,
            ],
            'access_token' => $auth->createToken('access-token')->plainTextToken,
        ];
    }
}
