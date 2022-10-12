<?php

namespace Atom\TeamGrid\Classes\Extend;

use RainLab\User\Models\User;
use Rainlab\User\Controllers\Users as UsersController;
use Event;

class UserExtend{

    public static function extendUser_AddRelations() {
        
        User::extend(function($model) {
            
            $model->hasMany['projects'] = ['Atom\Teamgrid\Models\Project'];
            $model->hasMany['tasks'] = ['Atom\Teamgrid\Models\Task'];
            $model->hasMany['time_entries'] = ['Atom\Teamgrid\Models\TimeEntry'];


            //TODO: many to many relation to projects
        });
    }

    public static function extendUser_AddColumns() {

        Event::listen('backend.list.extendColumns', function ($listWidget) {
            
            // Only for the User controller
            if (!$listWidget->getController() instanceof \Rainlab\User\Controllers\Users) {
                return;
            }
            
            // Only for the User model
            if (!$listWidget->model instanceof \Rainlab\User\Models\User) {
                return;
            }
            
            // Add an column
            $listWidget->addColumns([
                'projects' => [
                    'label' => 'Projects',
                    'relation' => 'projects',
                    'select' => 'name'
                ],
                'tasks' => [
                    'label' => 'Tasks',
                    'relation' => 'tasks',
                    'select' => 'name'
                ],
                'time_entries' => [
                    'label' => 'Time Entries',
                    'relation' => 'time_entries',
                    'select' => 'id'
                    ]
                ]);
        });
    }
}