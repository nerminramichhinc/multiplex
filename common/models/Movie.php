<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "movie".
 *
 * @property integer $id
 * @property string $movie_title
 * @property string $movie_duration
 * @property string $movie_synopsis
 * @property string $imdb_link
 * @property string $movie_cover
 *
 * @property GenreMovie[] $genreMovies
 * @property Image[] $images
 * @property MovieActor[] $movieActors
 * @property Projection[] $projections
 */
class Movie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['movie_duration'], 'safe'],
            [['movie_synopsis'], 'string'],
            [['movie_title'], 'string', 'max' => 50],
            [['movie_cover'], 'file'],
            [['imdb_link', 'movie_cover'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'movie_title' => 'Movie Title',
            'movie_duration' => 'Movie Duration',
            'movie_synopsis' => 'Movie Synopsis',
            'imdb_link' => 'Imdb Link',
            'movie_cover' => 'Movie Cover',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenreMovies()
    {
        return $this->hasMany(GenreMovie::className(), ['movie_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['movie_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovieActors()
    {
        return $this->hasMany(MovieActor::className(), ['movie_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjections()
    {
        return $this->hasMany(Projection::className(), ['movie_id' => 'id']);
    }
}
