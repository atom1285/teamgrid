<?php

namespace Atom\Teamgrid\Http\Resources;
 
use Illuminate\Http\Resources\Json\JsonResource;
 
class TimeEntryResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user_id,
            'task' => $this->task_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'finished' => $this->finished,
            'total_time' => $this->total_time,
        ];
    }
}