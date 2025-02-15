<?php

namespace App\Http\Resources\V1\Task;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /**
         * @var Task $user
         */
        return [
            'id' => $this->id,
            'text' => $this->text,
        ];
    }
}
