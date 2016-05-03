<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Movie;
use common\models\Genre;
use common\models\Actor;
use common\models\GenreList;
use common\models\ActorList;
use common\models\Upload;
use common\models\MovieActor;
use common\models\GenreMovie;
use common\models\Image;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class MovieController extends Controller
{
     public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['list', 'create', 'delete','update', 'insert', 'add-movie', 'save-movie', 'delete-movie-modal', 'update-movie-modal'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['list', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionAddMovie()
    {
        $model = new Movie();       
        $model_genre = new GenreList();
        $model_actor = new ActorList();
        $model_image = new Upload();
        //Genre list array
        $genres = Genre::find()->all();
        $data_genre = array();
        foreach ($genres as $genre){
            $data_genre[$genre->id] = $genre->genre_name;
        }
        //Actor list array
        $actors = Actor::find()->all();
        $data_actor = array();
        foreach ($actors as $actor){
            $data_actor[$actor->id] = $actor->first_name . ' ' . $actor->last_name;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->validate() 
            && $model_genre->load(Yii::$app->request->post()) && $model_genre->validate()
            && $model_actor->load(Yii::$app->request->post()) && $model_actor->validate()
            && $model_image->load(Yii::$app->request->post()) && $model_image->validate()
            )
        {
            $cover = UploadedFile::getInstance($model, 'movie_cover');
            $cover_name = Yii::$app->security->generateRandomString();
            $model->movie_cover = 'images/covers/' . $cover_name . '.' . $cover->extension;
            //$model->movie_cover = $cover_name . '.' . $cover->extension;
            $cover->saveAs('images/covers/' . $cover_name . '.' . $cover->extension);
            $model->created_at = date("Y-m-d H:i:s");
            $model->updated_at = date("Y-m-d H:i:s");
            $model->save();
            
            $genres_array = $model_genre->genre;
            $max = sizeof($genres_array);
            for($i = 0; $i < $max; $i++){
                $genremovie = new GenreMovie();
                $genremovie->genre_id = $genres_array[$i];
                $genremovie->movie_id = $model->id;
                $genremovie->insert();
            }

            $actors_array = $model_actor->actor;
            $max1 = sizeof($actors_array);
            for($i = 0; $i < $max1; $i++){
                $movieactor = new MovieActor();
                $movieactor->actor_id = $actors_array[$i];
                $movieactor->movie_id = $model->id;
                $movieactor->insert();
            }
            //Create directory for new movie
            $movie_folder = preg_replace('/[^A-Za-z0-9\-]/', '', $model->movie_title); 
            $path = 'images/galleries/'. $movie_folder;
            mkdir($path, 0777);
            // Get image gallery
            $model_image->imageFiles = UploadedFile::getInstances($model_image, 'imageFiles');
            $ordinal = 1;
            foreach ($model_image->imageFiles as $single_image) {
                $gallery_image = new Image();
                $image_name = Yii::$app->security->generateRandomString();
                $gallery_image->image_name = $path . '/' . $image_name . '.' . $single_image->extension;
                $gallery_image->image_ordinal = $ordinal;
                $ordinal++;
                $gallery_image->movie_id = $model->id;
                $gallery_image->created_at = date("Y-m-d H:i:s");
                $gallery_image->updated_at = date("Y-m-d H:i:s");
                $gallery_image->save();
                // save image to directory 
                $single_image->saveAs( $path . '/' . $image_name . '.' . $single_image->extension);
            }
            
            Yii::$app->session->setFlash('success', '"'.$model->movie_title .'"'.' successfully added.');
            return $this->redirect(['movie/list']);
        }
        else{
            return $this->render('add_movie', [
                'model' => $model,
                'model_genre'=> $model_genre,
                'model_actor'=> $model_actor,
                'model_image'=> $model_image,
                'data_genre' => $data_genre,
                'data_actor' => $data_actor,
                ]);
        }
    }
    
    public function actionDeleteMovieModal($id)
    {
        return $this->render('_delete_movie_modal', ['id' => $id]);
    }

    public function actionUpdateMovieModal($id)
    {
        $model = $this->findModel($id);
        $model->updated_at = date("Y-m-d H:i:s");
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->save();
            return $this->redirect(['movie/list']);
        }
        return $this->renderAjax('_update_movie_modal', ['id'=>$id, 'model' => $model]);
    }
    
    public  function actionSaveMovie()
    {
        $model = new Movie();   
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->created_at = date("Y-m-d H:i:s");
            $model->updated_at = date("Y-m-d H:i:s");
            $model->save();
            return $this->redirect(['movie/list']);
        }          
    }
    
    public function actionList()
    {
            $query = Movie::find();
        
        $provider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                'pageSize' => 10,
                ],
            'sort' => [
                    'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'movie_title' => SORT_ASC, 
            ]
        ],
    ]);
    return $this->render('list',  [
                'provider'=>$provider,
             ]);
    }

    public function actionCreate($title, $duration, $synopsis, $link, $cover)
    {   
        $movie = new Movie();
               $movie->movie_title = $title;
               $movie->movie_duration = $duration;
               $movie->movie_synopsis = $synopsis;
               $movie->imdb_link = $link;
               $movie->movie_cover = $cover;
       $movie->save(); 
    }

    public function actionUpdate($id, $title, $duration, $synopsis, $link, $cover)
    {
        $movie = $this->findModel($id);
               $movie->movie_title = $title;
               $movie->movie_duration = $duration;
               $movie->movie_synopsis = $synopsis;
               $movie->imdb_link = $link;
               $movie->movie_cover = $cover;
       $movie->save(); 
    }

    public function actionDelete($id)
    {
        $movie = $this->findModel($id);
        if($movie){
            //Remove files (images) stored in movie folder
            $movie_folder = preg_replace('/[^A-Za-z0-9\-]/', '', $movie->movie_title); 
            $path = 'images/galleries/'. $movie_folder;
            $folder_handler = dir($path);
            while ($file = $folder_handler->read()) {
                if ($file == "." || $file == "..")
                    continue;
                unlink($path.'/'.$file);
            }
            $folder_handler->close();
            // Remove movie folder
            rmdir($path);
            // Remove movie cover from 
            unlink(getcwd() . '/' . $movie->movie_cover);
            $movie->delete();
        }
        // return to previous page after deleting a record
        return $this->redirect(Yii::$app->request->referrer);
    }

    protected function findModel($id)
    {
        if (($model = Movie::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }
}
?>