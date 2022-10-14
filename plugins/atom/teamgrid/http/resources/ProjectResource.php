<?php

namespace Atom\Teamgrid\Http\Resources;
 
use Illuminate\Http\Resources\Json\JsonResource;
 
class ProjectResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'customer' => $this->customer_id,
            'project_manager' => $this->project_manager_id,
            'due_date' => $this->due_date,
            'accounting_type' => $this->accounting_type,
            'service_id' => $this->service_id,
            'accounting_rate' => $this->accounting_rate,
            'budget_type' => $this->budget_type,
            'budget_amount' => $this->budget_amount,
        ];
    }
}