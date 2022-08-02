<?php

namespace App\Http\Resources;

use App\Models\SoatoNew;
use Illuminate\Http\Resources\Json\JsonResource;

class EmploymentResource extends JsonResource
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
            'unemployed'=>$this->unemployed,
            'vacancies'=>$this->vacancies,
            'applicants'=>$this->applicants,
            'number_employed'=>$this->number_employed,
            'date'=>$this->date  
        ];
    }
}
