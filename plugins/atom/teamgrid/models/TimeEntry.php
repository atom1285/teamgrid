<?php namespace Atom\Teamgrid\Models;

use Model;
use Carbon\Carbon;

/**
 * TimeEntry Model
 */
class TimeEntry extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'atom_teamgrid_time_entries';

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

    public function beforeSave() {

        if ($this->end_time != null) {

            $total_time = now()->diffInMinutes($this->start_time); 
            
            $this->total_time = $total_time;

        }
    }
}
