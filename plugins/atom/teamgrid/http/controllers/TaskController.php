<?php

namespace Atom\Teamgrid\Http\Controllers;

//models:
use Atom\Teamgrid\Models\Task;
use LibUser\Userapi\Models\User as RainlabUser;


//user stuff
use Rainlab\User\Facades\Auth;
use LibUser\Userapi\Models\User;

//resources
use Atom\Teamgrid\Http\Resources\TaskResource as Resources;

use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Event;
use ApplicationException;

class TaskController extends Controller {

    public function getAll() {

        $tasks = Task::where('done', false);

        return Resources::collection($tasks);
    }

    public function get($id) {
        
        $task = Task::find($id)->where('done', false)->firstOrFail();

        return Resources::make($task);
    }
    
    public function create() {

        $task = new Task;

        $task->name = post('name');

        $task->user_id = auth()->user()->id;
        $task->project_id = post('project_id');

        $task->planned_start = Carbon::create(post('planned_start')) ?: null;
        $task->planned_end = Carbon::create(post('planned_end')) ?: null;
        $task->due_date = Carbon::create(post('due_date')) ?: null;
        
        $task->planned_time = Carbon::create(post('planned_time')) ?: null;
        $task->tracked_time = Carbon::create(post('tracked_time')) ?: null;

        $task->save();

        return Resources::make($task);

    }

    public function edit($id) {
        
        $task = Task::find($id)
        ->where('user_id', auth()->user()->id)
        ->where('done', false)
        ->firstOrFail();

        $task->name = post('name') ?: $task->name;
        $task->project_id = post('project_id') ?: $task->project_id;

        $task->planned_start = Carbon::create(post('planned_start')) ?: $task->planned_start;
        $task->planned_end = Carbon::create(post('planned_end')) ?: $task->planned_end;
        $task->due_date = Carbon::create(post('due_date')) ?: $task->due_date;
        
        $task->planned_time = Carbon::create(post('planned_time')) ?: $task->planned_time;
        $task->tracked_time = Carbon::create(post('tracked_time')) ?: $task->tracked_time;

        $task->save();

        return Resources::make($task);

    }
    
    public function complete($id) {

        $task = Task::find($id)
        ->where('user_id', auth()->user()->id)
        ->where('done', false)
        ->firstOrFail();

        $task->done = true;

        $task->save();

        return Resources::make($task);

    }

    public function delete($id) {

        $task = Task::find($id)
        ->where('user_id', auth()->user()->id)
        ->where('done', false)
        ->firstOrFail();

        $task->delete();

        return Resources::make($task);

    }

}