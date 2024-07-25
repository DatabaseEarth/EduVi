<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->Id_User,
            'full_name' => $this->FullName,
            'email' => $this->Email,
            'phone' => $this->Phone,
            'address' => $this->Address,
            'role' => $this->Role,
            'avatar' => $this->Avatar,
            'bills' => BillResource::collection($this->whenLoaded('bills')),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
        ];
    }
}
