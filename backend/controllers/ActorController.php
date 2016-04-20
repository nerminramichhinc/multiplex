<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Actor;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;

class ActorController extends Controller
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
        
        $query = Actor::find();
        
        $provider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                'pageSize' => 10,
                ],
            'sort' => [
                    'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'first_name' => SORT_ASC, 
            ]
        ],
    ]);
        
    return $this->render('list',  [
                'provider'=>$provider,
             ]);
    }
    
    
    
    
    public function actionCreate($firstname, $lastname)
    {   
        $actor = new Actor();
               $actor->first_name = $firstname;
               $actor->last_name = $lastname;
       $actor->save(); 
    }



    public function actionUpdate($id, $firstname, $lastname)
    {
        $actor = $this->findModel($id);
               $actor->first_name = $firstname;
               $actor->last_name = $lastname;
       $actor->save(); 
    }



    public function actionDelete($id)
    {
        $actor = $this->findModel($id);

        if($actor){
            $actor->delete();
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    protected function findModel($id)
    {
        if (($model = Actor::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }


}

?>