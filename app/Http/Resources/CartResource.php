<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Whoops\Exception\Formatter;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->Id_Cart,
            'product_id' => $this->Id_Product,
            'bill_id' => $this->Id_Bill,
            'price_product' => $this->Price_Product,
            'name_product' => $this->Name_Product,
            'image_product' => $this->Image_Product,
            'quantity' => $this->Quantity,
            'total' => $this->Total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'product' => new ProductResource($this->whenLoaded('product')),
            'bill' => new BillResource($this->whenLoaded('bill')),
        ];
    }
}
