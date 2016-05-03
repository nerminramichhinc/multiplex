<?php

namespace common\models;

use Yii;
use yii\base\Model;

class ActorList extends Model {

    public $actor;
    public function rules()
    {
       return[
           [['actor'], 'each', 'rule' => ['integer']],
       ];
    }
    public function attributeLabels() {
        return [
            'actor' => 'Select movie cast'
        ];
    }
}

