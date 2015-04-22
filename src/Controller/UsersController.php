<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * @property \App\Model\Table\TweetsTable $Tweets
 * @property \App\Model\Table\AccountParametersTable $AccountParameters
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Tweets');
        $this->loadModel('AccountParameters');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add', 'logout');
    }

    public function add()
    {
        $user = $this->Users->newEntity($this->request->data());
        $user->set('account_parameter', $this->AccountParameters->newEntity());

        if ($this->request->is('post')) {
            if (!$user->errors()) {
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your account has been created.'));
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'Tweets', 'action' => 'index']);
                }
                $this->Flash->error(__('Your account could not be created.'));
            }
        }

        $this->set('user', $user);
    }

    public function view($username)
    {
        $user = $this->Users->find('all')->contain(['AccountParameters', 'AccountParameters.Colors'])->where([
            'username' => $username
        ])->first();
        // $user->account_parameter->color

        if (null === $user) {
            throw new NotFoundException(__('User does not exist'));
        }

        $query = $this->Tweets->find('user', [
            'username' => $username
        ]);
        $query->limit(10);

        $this->set([
            'tweets' => $query->toArray(),
            'user' => $user
        ]);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Bad credentials.'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
