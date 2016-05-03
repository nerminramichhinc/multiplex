<?php

namespace common\models;
use Yii;

class MovieActor extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'movie_actor';
    }

    public function rules()
    {
        return [
            [['movie_id', 'actor_id'], 'integer'],
            [['actor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Actor::className(), 'targetAttribute' => ['actor_id' => 'id']],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::className(), 'targetAttribute' => ['movie_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'movie_id' => 'Movie ID',
            'actor_id' => 'Actor ID',
        ];
    }

    public function getActor()
    {
        return $this->hasOne(Actor::className(), ['id' => 'actor_id']);
    }

    public function getMovie()
    {
        return $this->hasOne(Movie::className(), ['id' => 'movie_id']);
    }
}
