<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->Id_Product,
            'name' => $this->Name,
            'price' => $this->Price,
            'image' => $this->Image,
            'describe' => $this->Describe,
            'hide' => $this->Hide,
            'view' => $this->View,
            'quantity' => $this->Quantity,
            'hot' => $this->Hot,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
        ];
    }
}
