<?php

namespace Atom\Teamgrid\Http\Controllers;

//models:
use Atom\Teamgrid\Models\Project;
use LibUser\Userapi\Models\User as RainlabUser;


//user stuff
use Rainlab\User\Facades\Auth;
use LibUser\Userapi\Models\User;

//resources
use Atom\Teamgrid\Http\Resources\ProjectResource as Resources;

use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Event;
use ApplicationException;

class projectController extends Controller {

    public static function isProjectManager($user) {

        foreach ($user->groups as $group) {
            if ($group->name == 'Project Manager') {
                return true;
            }
        }

        return false;

    }

    public function getAll() {

        $projects = Project::where('done', false);

        return Resources::collection($projects);
    }

    public function get($id) {

        
        $project = Project::find($id)->where('done', false)->firstOrFail();

        return Resources::make($project);
    }
    
    public function create() {
        
        if (self::isProjectManager($user = auth()->user()) == false) {
            throw new ApplicationException('You are not a project manager');
        }

        $project = new Project;

        $project->name = post('name');
        $project->description = post('description');

        $project->customer_id = post('customer_id');
        $project->project_manager_id = post('project_manager_id');

        $project->due_date = Carbon::create(post('due_date')) ?: null;
        
        $project->accounting_type = post('accounting_type') ?: 'disabled';
        $project->service_id = post('service_id');
        $project->accounting_rate = post('accounting_rate');

        $project->budget_type = post('budget_type') ?: 'disabled';
        $project->budget_amount = post('budget_amount');

        $project->save();

        return Resources::make($project);

    }

    public function edit($id) {

        if (self::isProjectManager($user = auth()->user()) == false) {
            throw new ApplicationException('You are not a project manager');
        }
        
        $project = Project::where('id', $id)
        ->where('done', false)
        ->firstOrFail();

        $project->name = post('name') ?: $project->name;
        $project->description = post('description') ?: $project->description;

        $project->customer_id = post('customer_id') ?: $project->customer_id;
        $project->project_manager_id = post('project_manager_id') ?: $project->project_manager_id;

        $project->due_date = Carbon::create(post('due_date')) ?: $project->due_date;
        
        $project->accounting_type = post('accounting_type') ?: 'disabled';
        $project->service_id = post('service_id') ?: $project->service_id;
        $project->accounting_rate = post('accounting_rate') ?: $project->accounting_rate;

        $project->budget_type = post('budget_type') ?: 'disabled';
        $project->budget_amount = post('budget_amount') ?: $project->budget_amount;

        $project->save();

        return Resources::make($project);

    }
    
    public function complete($id) {

        if (self::isProjectManager($user = auth()->user()) == false) {
            throw new ApplicationException('You are not a project manager');
        }

        $project = Project::find($id)
        ->where('done', false)
        ->firstOrFail();

        $project->done = true;

        $project->save();

        return Resources::make($project);

    }

    public function delete($id) {

        if (self::isProjectManager($user = auth()->user()) == false) {
            throw new ApplicationException('You are not a project manager');
        }

        $project = Project::find($id)
        ->where('done', false)
        ->firstOrFail();

        $project->delete();

        return Resources::make($project);

    }

}