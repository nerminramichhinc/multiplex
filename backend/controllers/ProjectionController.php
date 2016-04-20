<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Projection;
use yii\filters\VerbFilter;

class ProjectionController extends Controller
{

    public function actionCreate($time, $capacity, $profit, $movie_id)
    {   
        $projection = new Projection();
               $projection->projection_time = $time;
               $projection->projection_capacity = $capacity;
               $projection->projection_profit = $profit;
               $projection->movie_id = $movie_id;
       $projection->save(); 
    }



    public function actionUpdate($id, $time, $capacity, $profit, $movie_id)
    {
        $projection = $this->findModel($id);
               $projection->projection_time = $time;
               $projection->projection_capacity = $capacity;
               $projection->projection_profit = $profit;
               $projection->movie_id = $movie_id;
       $projection->save(); 
    }



    public function actionDelete($id)
    {
        $projection = $this->findModel($id);

        if($projection){
            $projection->delete();
        }

    }

    protected function findModel($id)
    {
        if (($model = Projection::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }


}

?>