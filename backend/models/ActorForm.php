<?php

namespace backend\models;

use Yii;
use yii\base\Model;


class ActorForm extends Model
{
    public $first_name;
    public $last_name;
    
    
     public function rules()
    {
        return [
            // username and password are both required
            [['first_name', 'last_name'], 'required'],
            // rememberMe must be a boolean value
            [['first_name','last_name'], 'string'],           
        ];
    }    
    
}
