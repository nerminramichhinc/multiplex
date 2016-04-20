<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Settings;
use yii\filters\VerbFilter;

class SettingsController extends Controller
{

    public function actionCreate($top_color, $central_color, $bottom_color)
    {   
        $settings = new Settings();
               $settings->$top_color = $top_color;
               $settings->$central_color = $central_color;
               $settings->$bottom_color = $bottom_color;
       $settings->save(); 
    }



    public function actionUpdate($id, $top_color, $central_color, $bottom_color)
    {
        $settings = $this->findModel($id);
               $settings->$top_color = $top_color;
               $settings->$central_color = $central_color;
               $settings->$bottom_color = $bottom_color;
       $settings->save(); 
    }



    public function actionDelete($id)
    {
        $settings = $this->findModel($id);

        if($settings){
            $settings->delete();
        }

    }

    protected function findModel($id)
    {
        if (($model = Settings::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }


}

?>