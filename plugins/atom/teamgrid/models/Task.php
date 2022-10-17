<?php namespace Atom\Teamgrid\Models;

use Model;

/**
 * Task Model
 */
class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $table = 'atom_teamgrid_tasks';
    public $rules = [];

    protected $dates = [
        'planned_start',
        'planned_end',
        'due_date',
        'created_at',
        'updated_at'
    ];

    public $hasMany = [
        'time_entries' => ['Atom\Teamgrid\Models\TimeEntry']
    ];

    public $belongsTo = [
        'user' => ['RainLab\User\Models\User'],
        'project' => ['Atom\Teamgrid\Models\Project']
    ];

    public function getTrackedTimeAttribute()
    {
        return $this->time_entries()->sum('total_time');        
    }

}
