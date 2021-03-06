<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public $helpers = [
    'Less.Less', // required for parsing less files
    'BootstrapUI.Form',
    'BootstrapUI.Html',
    'BootstrapUI.Flash',
    'BootstrapUI.Paginator'
    ];
    public function beforeFilter(\Cake\Event\Event $event)
    {
        //$this->Auth->allow(['index', 'view', 'display']);
    }
    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('Bootstrap');
        $this->set('Auth', $this->Auth);
    }
    
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authorize');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Accounts',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }
//    public function isAuthorized($user)
//{
//    // Admin can access every action
//    if (isset($user['role']) && $user['role'] === 'CEO') {
//        return true;
//    }
//
//    // Default deny
//    return false;
//}
}
