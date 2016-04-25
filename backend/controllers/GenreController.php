<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Genre;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;



class GenreController extends Controller
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
        
        $query = Genre::find();
        
        $provider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                'pageSize' => 10,
                ],
            'sort' => [
                    'defaultOrder' => [
                    'genre_name' => SORT_ASC, 
                    'created_at' => SORT_DESC,
                    
            ]
        ],
    ]);
        
    return $this->render('list',  [
                'provider'=>$provider,
             ]);
    }


    public function actionCreate($name)
    {   
        $genre = new Genre();
               $genre->genre_name = $name;
        $genre->save(); 
    }



    public function actionUpdate($id, $name)
    {
        $genre = $this->findModel($id);
               $genre->genre_name = $name;
        $genre->save(); 
    }



    public function actionDelete($id)
    {
        $genre = $this->findModel($id);

        if($genre){
            $genre->delete();
        }

    }

    protected function findModel($id)
    {
        if (($model = Genre::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }


}

?>