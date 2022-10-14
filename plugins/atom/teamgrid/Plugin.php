<?php namespace Atom\Teamgrid;

use Backend;
use System\Classes\PluginBase;
use Atom\TeamGrid\Classes\Extend\UserExtend;

use Atom\Teamgrid\Models\TimeEntry;

/**
 * teamgrid Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'teamgrid',
            'description' => 'No description provided yet...',
            'author'      => 'atom',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        //set timezones
        now()->setTimezone('Europe/Bratislava');
        date_default_timezone_set('Europe/Bratislava');

        //extend user model
        UserExtend::extendUser_AddRelations();
        UserExtend::extendUser_AddColumns();
        UserExtend::extendUser_addScopes();
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'teamgrid' => [
                'label'       => 'Teamgrid projects', 
                'url'         => Backend::url('atom/teamgrid/projects'),
                'icon'        => 'icon-briefcase',
                'permissions' => ['atom.teamgrid.*'],
                'order'       => 500,

                'sideMenu' => [
                    'projects' => [
                        'label'       => 'Projects', 
                        'url'         => Backend::url('atom/teamgrid/projects'),
                        'icon'        => 'icon-briefcase',
                        'permissions' => ['atom.teamgrid.*']
                    ],
                    'tasks' => [
                        'label' => 'Tasks',
                        'icon'        => 'icon-tasks',
                        'url'         => Backend::url('atom/teamgrid/tasks'),
                        'permissions' => ['atom.teamgrid.*']
                    ],
                    'timeentries' => [
                        'label' => 'Time Entries',
                        'icon'        => 'icon-clock-o',
                        'url'         => Backend::url('atom/teamgrid/timeentries'),
                        'permissions' => ['atom.teamgrid.*']
                    ]
                ]
            ]
        ];
    }
}
