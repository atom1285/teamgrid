<?php namespace Atom\Teamgrid\Models;

use Model;
/**
 * TimeEntry Model
 */
class TimeEntry extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'atom_teamgrid_time_entries';
    public $rules = [];

    protected $dates = [
        'start_time',
        'end_time',
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'user' => ['RainLab\User\Models\User'],
        'task' => ['Atom\Teamgrid\Models\Task']
    ];


    public function afterSave() {
        //TODO: update task tracked time here

    }
}
