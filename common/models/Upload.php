<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Upload extends Model
{
    public $imageFiles;

    public function attributes()
    {
        return [
            'imageFiles',
        ];
    }
    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
}