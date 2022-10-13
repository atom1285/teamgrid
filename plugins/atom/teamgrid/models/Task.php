<?php namespace Atom\Teamgrid\Models;

use Model;

/**
 * Task Model
 */
class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'atom_teamgrid_tasks';

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
        'planned_start',
        'planned_end',
        'due_date',
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];

    public $hasMany = [
        'time_entries' => ['Atom\Teamgrid\Models\TimeEntry']
    ];

    public $hasOneThrough = [];
    public $hasManyThrough = [];

    public $belongsTo = [
        'user' => ['RainLab\User\Models\User'],
        'project' => ['Atom\Teamgrid\Models\Project']
    ];

    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
