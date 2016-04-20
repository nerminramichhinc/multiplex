<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Movie;
use yii\filters\VerbFilter;

class MovieController extends Controller
{
     public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['list', 'create', 'delete'],
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
    
    
    
    
    
    public function actionList() {
        
        $movies = Movie::find()->all();
        
        return $this->render('list',  [
                'movies'=>$movies
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