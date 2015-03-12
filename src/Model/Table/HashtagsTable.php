<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;

class HashtagsTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsToMany('Tweets');
    }

    public function findPopular(Query $query, array $options)
    {
        $query->limit(isset($options['limit']) ? $options['limit'] : 10);
        $query->order(['Hashtags.counter' => 'DESC']);

        return $query;
    }
}