<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Actor;
use yii\filters\VerbFilter;

class ActorController extends Controller
{

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