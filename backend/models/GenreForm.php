<?php

namespace backend\models;

use Yii;
use yii\base\Model;


class GenreForm extends Model
{
    public $genre_name;
        
     public function rules()
    {
        return [
            //genre name is required
            ['genre_name', 'required'],
            ['genre_name', 'string'],           
        ];
    }    
    
}
