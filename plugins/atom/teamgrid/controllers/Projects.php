<?php namespace Atom\Teamgrid\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Projects Back-end Controller
 */
class Projects extends Controller
{
    public $relationConfig = '$/atom/teamgrid/config/config_accounting_people_relation.yaml';
    
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController'
    ];


    
    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';


    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Atom.Teamgrid', 'teamgrid', 'projects');
    }
}
