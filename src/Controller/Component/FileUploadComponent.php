<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class FileUploadComponent extends Component
{
    protected $upload_dir;

    public function initialize(array $config)
    {
        $this->upload_dir = $this->_getSystemPath($config['upload_dir']);
    }

    public function handle(array $file_data)
    {
        $destination_file_name = $this->_generateRandomName() . '.' . $this->_getExtension($file_data['name']);
        $file_pathname = $this->upload_dir . '/' . $destination_file_name;
        if ($this->beforeMoveUploadedFile($file_data) === false) {
            return false;
        }
        return move_uploaded_file($file_data['tmp_name'], $file_pathname) ? $destination_file_name : false;
    }

    public function deleteFile($file_name)
    {
        $file_pathname = $this->upload_dir . '/' . $file_name;
        if ($file_name && is_file($file_pathname)) {
            return unlink($file_pathname);
        } else {
            return false;
        }
    }

    protected function beforeMoveUploadedFile(array $file_data)
    {
    }

    protected function _generateRandomName()
    {
        return md5(uniqid());
    }

    protected function _getExtension($file_name)
    {
        $parts = explode('.', $file_name);
        $extension = end($parts);
        return ($file_name != $extension) ? $extension : '';
    }

    protected function _getSystemPath($upload_dir)
    {
        if (preg_match('#^\/(.*)#', $upload_dir)) {
            return $upload_dir;
        } else {
            return ROOT . '/' . $upload_dir;
        }
    }
}