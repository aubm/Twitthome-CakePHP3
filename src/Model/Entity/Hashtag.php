<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Hashtag extends Entity
{
    /**
     * @return Hashtag
     */
    public function incrementCounter()
    {
        if (!$this->get('counter')) {
            $this->set('counter', 0);
        }

        $this->counter++;

        return $this;
    }
}