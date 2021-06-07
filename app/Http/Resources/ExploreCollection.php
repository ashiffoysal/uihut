<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExploreCollection extends ResourceCollection
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
                    'title' => $data->title,
                    'details' => $data->details,
                    'button_text' => $data->button_text,
                    'button_link' => $data->button_link,
                    'video' => url('storage/app/public/'.$data->video),
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
