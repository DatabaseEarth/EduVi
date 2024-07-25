<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->Id_Bill,
            'user_id' => $this->Id_User,
            'name_orderer' => $this->Name_Orderer,
            'email_orderer' => $this->Email_Orderer,
            'phone_orderer' => $this->Phone_Orderer,
            'address_orderer' => $this->Address_Orderer,
            'name_recipient' => $this->Name_recipient,
            'total' => $this->Total,
            'ship' => $this->Ship,
            'voucher' => $this->Voucher,
            'total_payment' => $this->Total_Payment,
            'status' => $this->Status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'carts' => CartResource::collection($this->whenLoaded('carts')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
