<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

use common\models\Genre;
use backend\models\GenreForm;

use yii\data\ActiveDataProvider;
use yii\helpers\Url;



class GenreController extends Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['list', 'create', 'delete', 'insert'],
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
    
    public function actionInsert()
    {
        $model = new GenreForm();
        
        
        // CHECK IF FORM IS SUBMITTED
        //isset();
            
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            
            //return $this->redirect('/genre/list'); -- Checking if submit works
            
            $genre = new Genre();
            
                $genre->genre_name = $model->genre_name;
                $genre->created_at = date("Y-m-d H:i:s");
                $genre->updated_at = date("Y-m-d H:i:s");
                
            $genre->save();
            
            return $this->redirect(Url::toRoute('genre/list', true));
            
        }          
        
        return $this->render('insert',[
            
            'model'=>$model,
        ]);
        
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