<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class TweetsTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Users');
        $this->belongsToMany('Hashtags');
        $this->addBehavior('Timestamp');
    }

    public function findAll(Query $query, array $options)
    {
        $query->contain(['Users', 'Users.AccountParameters']);
        $query->order(['Tweets.created' => 'DESC']);

        return $query;
    }

    public function findUser(Query $query, array $options)
    {
        $query->contain(['Users', 'Users.AccountParameters']);
        $query->matching('Users', function ($q) use ($options) {
            return $q->where(['Users.username' => $options['username']]);
        });
        $query->order(['Tweets.created' => 'DESC']);

        return $query;
    }

    public function findTagged(Query $query, array $options)
    {
        $query->contain(['Users', 'Users.AccountParameters', 'Hashtags']);
        $query->matching('Hashtags', function ($q) use ($options) {
            return $q->where(['Hashtags.name' => $options['tag_name']]);
        });
        $query->order(['Tweets.created' => 'DESC']);

        return $query;
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->add('content', 'maxLength', [
                'rule' => ['maxLength', 140]
            ]);
    }
}