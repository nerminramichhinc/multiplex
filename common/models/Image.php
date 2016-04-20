<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $image_name
 * @property integer $image_ordinal
 * @property string $date_added
 * @property string $date_updated
 * @property integer $movie_id
 *
 * @property Movie $movie
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_ordinal', 'movie_id'], 'integer'],
            [['date_added', 'date_updated'], 'safe'],
            [['image_name'], 'string', 'max' => 100],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::className(), 'targetAttribute' => ['movie_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_name' => 'Image Name',
            'image_ordinal' => 'Image Ordinal',
            'date_added' => 'Date Added',
            'date_updated' => 'Date Updated',
            'movie_id' => 'Movie ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::className(), ['id' => 'movie_id']);
    }
}
