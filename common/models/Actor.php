<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "actor".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 *
 * @property MovieActor[] $movieActors
 */
class Actor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'actor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovieActors()
    {
        return $this->hasMany(MovieActor::className(), ['actor_id' => 'id']);
    }
}
