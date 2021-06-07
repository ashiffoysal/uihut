<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BannerCollection extends ResourceCollection
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
                    'heading_text' => $data->heading_text,
                    'sub_text' => $data->sub_text,
                    'video_link' => url('storage/app/public/'.$data->video_link),
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
