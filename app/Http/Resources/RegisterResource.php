<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->resource['name'],
            'email' => $this->resource['email'],
            'token' => $this->resource['token'],
        ];
    }
}
