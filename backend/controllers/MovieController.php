<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Movie;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

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
        return $this->renderAjax('_add_movie_modal', ['model' => $model]);
    }
    
    public function actionDeleteMovieModal($id)
    {
        return $this->renderAjax('_delete_movie_modal', ['id' => $id]);
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