<?php

namespace common\models;

use Yii;
use yii\base\Model;

class GenreList extends Model {

    public $genre;
    public function rules()
    {
       return[
           [['genre'], 'each', 'rule' => ['integer']],
       ];
    }
    public function attributeLabaels() {
        return [
            'genre' => 'Choose movie genre(s)'
        ];
    }
}

