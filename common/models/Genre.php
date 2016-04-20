<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property integer $id
 * @property string $genre_name
 *
 * @property GenreMovie[] $genreMovies
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['genre_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genre_name' => 'Genre Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenreMovies()
    {
        return $this->hasMany(GenreMovie::className(), ['genre_id' => 'id']);
    }
}
