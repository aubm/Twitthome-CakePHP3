<?php

namespace App\Controller;

/**
 * @property \App\Model\Table\TweetsTable $Tweets
 */
class HashtagsController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Tweets');
    }

    public function view($name)
    {
        $query = $this->Tweets->find('tagged', [
            'tag_name' => $name
        ]);
        $query->limit(10);

        $this->set([
            'tweets' => $query->toArray(),
            'hashtag_name' => $name
        ]);
    }
}