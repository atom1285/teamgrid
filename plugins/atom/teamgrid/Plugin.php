<?php namespace Atom\Teamgrid;

use Backend;
use System\Classes\PluginBase;

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
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Atom\Teamgrid\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'atom.teamgrid.some_permission' => [
                'tab' => 'teamgrid',
                'label' => 'Some permission'
            ],
        ];
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
