<?php

namespace App\Controller;
use Cake\Event\Event;
use Cake\Network\Exception\BadRequestException;

/**
 * @property \App\Model\Table\TweetsTable $Tweets
 * @property \App\Model\Table\HashtagsTable $Hashtags
 * @property \App\Model\Table\UsersTable $Users
 */
class TweetsController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Hashtags');
        $this->loadModel('Users');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('load');
    }

    public function index()
    {
        $query = $this->Tweets->find('all');
        $query->limit(10);
        $this->set('tweets', $query->toArray());
    }

    public function add()
    {
        if ($this->request->is('post')) {

            $tweet = $this->Tweets->newEntity($this->request->data);
            $tweet->set('user_id', $this->Auth->user()['id']);

            $tweet_hashtags = [];
            foreach ($tweet->get('extracted_hashtags') as $hashtag_name) {
                $tweet_hashtags[] = $this->Hashtags->findOrCreate([
                    'name' => $hashtag_name
                ])->incrementCounter();
            }
            $tweet->set('hashtags', $tweet_hashtags);

            if (!$this->Tweets->save($tweet)) {
                $this->Flash->error(__('The tweet could not be added'));
            }
        }

        return $this->redirect(['controller' => 'Tweets', 'action' => 'index']);
    }

    public function load()
    {
        if (!$this->request->is('ajax')) {
            throw new BadRequestException();
        }

        $what = $this->request->query('what');
        $offset = $this->request->query('offset');
        $limit = $this->request->query('limit');

        $options = $this->request->query('options') ? $this->request->query('options') : [];
        $query = $this->Tweets->find($what, $options);
        $query->offset($offset);
        $query->limit($limit);
        $tweets = $query->toArray();

        $this->set('tweets', $tweets);
        $this->set('offset', $offset + $limit);
        $this->set('limit', $limit);
        $this->set('what', $what);
        $this->set('username', @$options['username']);
        $this->set('tag_name', @$options['tag_name']);
        $this->render(null, 'ajax');
    }
}
