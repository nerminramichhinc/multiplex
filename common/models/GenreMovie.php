<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "genre_movie".
 *
 * @property integer $id
 * @property integer $genre_id
 * @property integer $movie_id
 *
 * @property Movie $movie
 * @property Genre $genre
 */
class GenreMovie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genre_movie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['genre_id', 'movie_id'], 'integer'],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::className(), 'targetAttribute' => ['movie_id' => 'id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['genre_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genre_id' => 'Genre ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }
}
