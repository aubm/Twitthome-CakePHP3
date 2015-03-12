<?php

namespace App\View\Helper;

use Cake\View\Helper;

class TweetHelper extends Helper
{
    public $helpers = ['Avatar', 'Url'];

    public function render($tweet)
    {
        $user_url = $this->Url->build(['_name' => 'user_details', 'username' => $tweet->user->username]);

        return <<<TWEET
<li>
    <div class="row">
        <div class="col-xs-2">
            <a href="{$user_url}">
                {$this->Avatar->render($tweet->user->account_parameter->avatar_file_name)}
            </a>
        </div>
        <div class="col-xs-10 tweet-details">
            <div class="meta">
                <p class="username"><a href="{$user_url}">{$tweet->user->username}</a></p>
                <time class="date">{$tweet->created->format('Y-m-d H:i:s')}</time>
            </div>
            <div class="content">
                <p>{$tweet->formatted_content}</p>
            </div>
        </div>
    </div>
</li>
TWEET;
    }
}