<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\helpers\Url;
use common\models\Actor;
use backend\models\ActorForm;
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
                        'actions' => ['list', 'create', 'delete','update', 'insert', 'add-actor-modal', 'save-actor', 'delete-actor-modal', 'update-actor-modal'],
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
    
    public function actionAddActorModal()
    {
        $model = new Actor();        
        return $this->renderAjax('_add_actor_modal', ['model' => $model]);
    }
    
    public function actionDeleteActorModal($id)
    {
        return $this->renderAjax('_delete_actor_modal', ['id' => $id]);
    }

    public function actionUpdateActorModal($id)
    {
        $model = $this->findModel($id);
        $model->updated_at = date("Y-m-d H:i:s");
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->save();
            return $this->redirect(['actor/list']);
        }
        return $this->renderAjax('_update_actor_modal', ['id'=>$id, 'model' => $model]);
    }
    
        
    public  function actionSaveActor()
    {
        $actor = new Actor();   
        if ($actor->load(Yii::$app->request->post()) && $actor->validate()){
            $actor->created_at = date("Y-m-d H:i:s");
            $actor->updated_at = date("Y-m-d H:i:s");
            $actor->save();
            return $this->redirect(['actor/list']);
        }          
    }

    public function actionInsert()
    {
        $model = new ActorForm();     
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $actor = new Actor();         
            $actor->first_name = $model->first_name;
            $actor->last_name = $model->last_name;
            $actor->created_at = date("Y-m-d H:i:s");
            $actor->updated_at = date("Y-m-d H:i:s");
            $actor->save();
            return $this->redirect(['actor/list']);
        }          
        
        return $this->render('insert',[
            'model'=>$model,
        ]);
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
                    'first_name' => SORT_ASC, 
                    'created_at' => SORT_DESC,
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