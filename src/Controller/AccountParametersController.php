<?php

namespace App\Controller;

/**
 * @property \App\Model\Table\AccountParametersTable $AccountParameters
 * @property \App\Controller\Component\ImageUploadComponent $ImageUpload
 */
class AccountParametersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Users');
        $this->loadComponent('ImageUpload', [
            'upload_dir' => 'webroot/img/avatars'
        ]);
    }

    public function edit()
    {
        $account_parameters = $this->AccountParameters->findOrCreate([
            'user_id' => $this->Auth->user()['id']
        ]);

        if ($this->request->is(['post', 'put'])) {
            $this->AccountParameters->patchEntity($account_parameters, $this->request->data());
            if (!$account_parameters->errors()) {

                $avatar_file_data = $this->request->data()['avatar_image'];
                if ($avatar_file_data['name']) {
                    $this->ImageUpload->deleteFile($account_parameters->get('avatar_file_name'));
                    $account_parameters->set('avatar_file_name', $this->ImageUpload->handle($avatar_file_data));
                }

                $this->AccountParameters->save($account_parameters);
                $this->Flash->success(__('Account parameters have been saved'));
                return $this->redirect(['_name' => 'account_parameters_edit']);
            }
        }

        $this->set('account_parameters', $account_parameters);
    }
}