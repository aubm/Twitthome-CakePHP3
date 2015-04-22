<?php

namespace App\Model\Table;

use Cake\Orm\Table;

class ColorsTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('AccountParameters');
    }
}
