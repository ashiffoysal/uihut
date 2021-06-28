<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SaveProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) {
                return [
                    'id' => $data->id,
                    'image' => asset('public/uploads/products/thumbnail/'.$data->product->thumbnail_img ??' '),
                    'name' => $data->product->title ?? ' ',
                    'product_id' => $data->product->id ?? ' ',
                ];
            })
        ];
    }
}
