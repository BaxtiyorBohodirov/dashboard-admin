<?php

namespace App\Http\Resources;

use App\Models\SoatoNew;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
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
            'number_centers'=>$this->number_centers,
            'capacity_centers'=>$this->capacity_centers,
            'number_scholarships'=>$this->number_scholarships,
            'number_students'=>$this->number_students,
            'number_graduates'=>$this->number_graduates,
            'number_dropouts'=>$this->number_dropouts,
            'number_employed'=>$this->number_employed,
            'date'=>$this->date  
        ];
    }
}
