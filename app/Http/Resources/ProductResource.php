<?php

namespace App\Http\Resources;

use App\Helper\SoftwareRelationship;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $softwarename = new SoftwareRelationship();
        $data = array();
        $data['id'] = $this->id;
        $data['title'] = $this->title;
        $data['slug'] = $this->slug;
        $data['description'] = $this->description;
        $data['tag'] = explode(',',$this->tag);
        $data['image'] = json_decode($this->gallery_img);
        $data['software'] = SoftwareRelationship::doRelation($this->software,$this->link);
        $data['file_type'] = $this->file_type;
        $data['cat_slug'] = $this->cat_slug;
        $data['cat_slug'] = $this->cat_slug;
        $data['subcat_slug'] = $this->subcat_slug;
        return $data;
    }
}
