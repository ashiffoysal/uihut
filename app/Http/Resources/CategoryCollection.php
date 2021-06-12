<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
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
            'data' => $this->collection->map(function($data) {
                return [
                    'name' => $data->name,
                    'image' => asset('public/uploads/category/'.$data->image),
                    'icon' => $data->icon,
                    'slug' => $data->slug,
                    'subcat' => $data->subcategory->slug ??' ',
                ];
            })
        ];
    }

     
    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
