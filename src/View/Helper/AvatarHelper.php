<?php

namespace App\View\Helper;

use Cake\View\Helper;

class AvatarHelper extends Helper
{
    public $helpers = ['Html'];

    public function render($avatar_file_name)
    {
        $avatar_path = $avatar_file_name ?
            'avatars/' . h($avatar_file_name) : 'no-avatar.jpg';

        return $this->Html->image($avatar_path, [
            'alt' => 'Avatar',
            'class' => 'img-responsive thumbnail'
        ]);
    }
}