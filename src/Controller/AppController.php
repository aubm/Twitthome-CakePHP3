<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Tweets',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Tweets',
                'action' => 'index'
            ]
        ]);
    }

    public function beforeFilter(Event $event)
    {
        $browser_language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        I18n::locale($browser_language);

        $this->Auth->allow(['index', 'view', 'display']);
    }
}
