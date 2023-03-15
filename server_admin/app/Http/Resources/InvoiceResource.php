<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            "invoice" => $this->invoice,
            "customer_id" => $this->customer_id,
            "service" => $this->service,
            "name" =>  $this->name,
            "phone" => $this->phone,
            "address" => $this->address,
            "status" => $this->status,
            "substatus" => $this->substatus,
            "grand_total" => $this->grand_total,
            "orders" => OrderResource::collection($this->orders)
        ];
    }
}
