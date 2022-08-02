<?php

namespace App\Http\Resources;

use App\Models\SoatoNew;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
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
            'id'=>$this->id,
            'soato'=>$this->soato_new_id,
            'tuman'=>SoatoNew::find($this->soato_new_id)->name_uz_cl,
            'total_employees'=>$this->total_employees,
            'active_population'=>$this->active_population,
            'employees'=>$this->employees,
            'average_populartion'=>$this->average_populartion,
            'unemployed'=>$this->unemployed,
           'rate_unemployement'=>$this->rate_unemployement,
            'unactive_population'=>$this->unactive_population,
            'date'=>$this->date  
        ];
    }
}
