<?php namespace Atom\Teamgrid\Models;

use Model;

/**
 * Project Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'atom_teamgrid_projects';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'due_date',
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];

    public $hasMany = [
        'tasks' => ['Atom\Teamgrid\Models\Task'],
        'accounting_people' => ['Rainlab\User\Models\User'],
    ];

    public $hasOneThrough = [];
    public $hasManyThrough = [];

    public $belongsTo = [
        'project_manager' => ['Rainlab\User\Models\User'], 
        'customer' => ['Rainlab\User\Models\User']
    ];
    
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
