<?php

namespace Atom\TeamGrid\Classes\Extend;

use RainLab\User\Models\User;
use Rainlab\User\Controllers\Users as UsersController;
use Event;

class UserExtend{

    public static function extendUser_AddRelations() {
        
        User::extend(function($model) {
            
            $model->hasMany['owned_projects'] = ['Atom\Teamgrid\Models\Project'];
            $model->hasMany['tasks'] = ['Atom\Teamgrid\Models\Task'];
            $model->hasMany['time_entries'] = ['Atom\Teamgrid\Models\TimeEntry'];
            $model->hasMany['work_projects'] = ['Atom\Teamgrid\Models\Project', 'table' => 'atom_teamgrid_project_user'];
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
                'groups' => [
                    'label' => 'Group',
                    'relation' => 'groups',
                    'select' => 'name',
                ],
                'owned_projects' => [
                    'label' => 'Owns projects:',
                    'relation' => 'owned_projects',
                    'select' => 'name'
                ],
                'work_projects' => [
                    'label' => 'Works on projects:',
                    'relation' => 'work_projects',
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