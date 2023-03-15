<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "image" => $this->image,
            "invoice" => $this->invoice,
            "invoice_id" => $this->invoice_id,
            "product_id" => $this->product_id,
            "product_name" => $this->product_name,
            "qty" => $this->qty,
            "price" => $this->price,

        ];
    }
}