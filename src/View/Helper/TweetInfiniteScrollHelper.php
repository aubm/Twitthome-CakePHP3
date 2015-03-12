<?php

namespace App\View\Helper;

use Cake\View\Helper;

class TweetInfiniteScrollHelper extends Helper
{
    public $helpers = ['Html', 'Url'];

    public function render(array $options = [])
    {
        $this->Html->script('tweets_infinite_scroll.js', ['block' => true]);

        return $this->Html->link('', $this->Url->build(['_name' => 'tweet_load']) . '?' .
            http_build_query($options + [
                    'what' => 'all',
                    'offset' => 10,
                    'limit' => 10
                ]), [
            'class' => 'jscroll-next'
        ]);
    }
}