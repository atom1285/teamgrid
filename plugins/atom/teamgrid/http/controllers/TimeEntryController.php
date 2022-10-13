<?php

namespace Atom\Teamgrid\Http\Controllers;

//models:
use Atom\Teamgrid\Models\TimeEntry;
use LibUser\Userapi\Models\User as RainlabUser;


//user stuff
use Rainlab\User\Facades\Auth;
use LibUser\Userapi\Models\User;

//resources
use Atom\Teamgrid\Http\Resources\TimeEntryResource as Resources;

use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Event;
use ApplicationException;

class TimeEntryController extends Controller {

    public function start() {

        $entry = new TimeEntry;

        $entry->user_id = auth()->user()->id;
        $entry->task_id = post('task_id');

        $entry->start_time = now();

        $entry->save();

        return Resources::make($entry);
    }

    public function end($id) {

        $entry = TimeEntry::find($id)
        ->where('finished', false)
        ->where('user_id', auth()->user()->id)
        ->firstOrFail();

        $start_time = Carbon::create($entry->start_time);
        $total_time = now()->diff($start_time)->format('%H:%I:%S');

        $entry->end_time = now();
        $entry->total_time = $total_time;
        $entry->finished = true;

        $entry->save();

        return Resources::make($entry);

    }

}