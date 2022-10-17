<?php

namespace Atom\Teamgrid\Http\Resources;
 
use Illuminate\Http\Resources\Json\JsonResource;
use Atom\Teamgrid\Models\Task;
 
class TaskResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user' => $this->user_id,
            'project' => $this->project_id,
            'planned_start' => $this->planned_start,
            'planned_end' => $this->planned_end,
            'due_date' => $this->due_date,
            'planned_time' => $this->planned_time,
            'tracked_time' => $this->tracked_time,
        ];
    }
}