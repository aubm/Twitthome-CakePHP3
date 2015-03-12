<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * @property \App\Model\Table\HashtagsTable $Hashtags
 */
class PopularHashtagsCell extends Cell
{
    public function display()
    {
        $this->loadModel('Hashtags');
        $hashtags = $this->Hashtags->find('popular')->toArray();
        $this->set('hashtags', $hashtags);
    }
}