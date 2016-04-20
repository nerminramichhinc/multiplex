<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Actor;
use yii\filters\VerbFilter;
use yii\data\Pagination;

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
        
        $pagination = new Pagination([
            
            'defaultPageSize' => 1,
            'totalCount' => $query->count(),           
            
        ]);
        
        $actors = $query->orderBy('first_name')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();       
        
        
        return $this->render('list',  [
                'actors'=>$actors,
                'pagination'=>$pagination,
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