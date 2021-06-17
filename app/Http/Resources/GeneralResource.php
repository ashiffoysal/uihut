<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GeneralResource extends JsonResource
{
    
    public function toArray($request)
    {

        return [
            'company_name' => $this->company_name,
            'company_motto' => $this->company_motto,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'telephone' => $this->telephone,
            'logo' => asset('public/uploads/logo/'.$this->logo),
            'favicon' => asset('public/uploads/logo'.$this->favicon),
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
