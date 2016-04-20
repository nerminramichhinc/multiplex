<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Currency;
use yii\filters\VerbFilter;

class CurrencyController extends Controller
{

    public function actionCreate($name, $used)
    {   
        $currency = new Currency();
               $currency->currency_name = $name;
               $currency->is_used = $used;
       $currency->save(); 
    }



    public function actionUpdate($id, $name, $used)
    {
        $currency = $this->findModel($id);
               $currency->currency_name = $name;
               $currency->is_used = $used;
       $currency->save(); 
    }



    public function actionDelete($id)
    {
        $currency = $this->findModel($id);

        if($currency){
            $currency->delete();
        }

    }

    protected function findModel($id)
    {
        if (($model = Currency::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }


}

?>