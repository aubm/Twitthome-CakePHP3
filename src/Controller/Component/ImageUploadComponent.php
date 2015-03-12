<?php

namespace App\Controller\Component;

class ImageUploadComponent extends FileUploadComponent
{
    protected function beforeMoveUploadedFile(array $file_data)
    {
        return getimagesize($file_data['tmp_name']);
    }
}