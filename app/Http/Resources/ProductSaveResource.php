<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSaveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => asset('public/uploads/products/thumbnail/'.$this->product->thumbnail_img ?? ' '),
            'name' => $this->product->title ?? ' ',
            'product_id' => $this->product->id ?? ' ',
        ];
    }
}
