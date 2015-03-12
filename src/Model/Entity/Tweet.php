<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Tweet extends Entity
{
    protected function _setContent($content)
    {
        $formatted_content = $content;

        // extract hashtags
        preg_match_all('/\#([a-zA-Z0-9]+)/', $formatted_content, $matches);
        $hashtags = $matches[1];
        $this->set('extracted_hashtags', $hashtags);

        // replace line breaks
        $formatted_content = str_replace("\n", '<br />', $formatted_content);
        // add @usernames anchors
        $formatted_content = preg_replace('/\@([a-zA-Z0-9_]+)/', '<a href="/users/$1">@$1</a>', $formatted_content);
        // add #hashtags anchors
        $formatted_content = preg_replace('/\#([a-zA-Z0-9]+)/', '<a href="/hashtags/$1">#$1</a>', $formatted_content);
        // add link anchros
        $formatted_content = preg_replace('#(https?:\/\/([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w\.-]*)*\/?)#',
            '<a href="$1" target="_blank">$1</a>', $formatted_content);

        $this->set('formatted_content', $formatted_content);

        return $content;
    }
}