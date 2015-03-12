<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->hasOne('AccountParameters');
        $this->hasMany('Tweets');
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', __('Username must not be empty'))
            ->notEmpty('password', __('Password must not be empty'))
            ->notEmpty('email', __('E-mail must not be empty'))
            ->add('email', 'validFormat', [
                'rule' => 'email',
                'message' => __('E-mail must be valid')
            ])
            ->notEmpty('first_name', __('First name must not be empty'))
            ->notEmpty('last_name', __('Last name must not be empty'));
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}