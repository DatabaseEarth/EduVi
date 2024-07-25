<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->Id_Category,
            'name' => $this->Name,
            'hide' => $this->Hide,
            'describe' => $this->Describe,
            'image' => $this->Image,
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
