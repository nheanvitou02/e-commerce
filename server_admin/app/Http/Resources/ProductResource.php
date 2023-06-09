<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "title" => $this->title,
            "slug" => $this->slug,
            "customer_id" => json_decode($this->customer_id, true),
            "category_id" => $this->category_id,
            "brand_id" => $this->brand_id,
            "brand" => BrandResource::make($this->brand)->only('name'),
            "content" => $this->content,
            "status" => $this->status,
            "level" => $this->level,
            "price" => $this->price,
            "discount" => $this->discount ?? 0,
            "created_at" => $this->created_at
        ];
    }
}
