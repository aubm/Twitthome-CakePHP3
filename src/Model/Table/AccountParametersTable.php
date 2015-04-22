<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AccountParametersTable extends Table
{
    public function initialize(array $config)
    {
        $this->entityClass('\App\Model\Entity\AccountParameters');

        $this->belongsTo('Colors');
        $this->belongsTo('Users');
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->allowEmpty('avatar_image')
            ->add('avatar_image', 'mimeType', [
                'rlle' => ['mimeType', ['image/jpeg', 'image/png']],
                'message' => __('The file must be an valid image')
            ])
            ->add('avatar_image', 'fileSize', [
                'rule' => ['fileSize', '<', '2MB'],
                'message' => __('The file must be less than 2MB')
            ]);
    }
}
