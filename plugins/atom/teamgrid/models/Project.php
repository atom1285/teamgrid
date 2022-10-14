<?php namespace Atom\Teamgrid\Models;

use Model;

/**
 * Project Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $table = 'atom_teamgrid_projects';
    public $rules = [];

    protected $dates = [
        'due_date',
        'created_at',
        'updated_at'
    ];


    public $hasMany = [
        'tasks' => ['Atom\Teamgrid\Models\Task'],
    ];

    public $belongsTo = [
        'project_manager' => ['Rainlab\User\Models\User'], 
        'customer' => ['Rainlab\User\Models\User'],
    ];
    
    public $belongsToMany = [
        'accounting_people' => ['Rainlab\User\Models\User', 'table' => 'atom_teamgrid_project_user'],
    ];
}
