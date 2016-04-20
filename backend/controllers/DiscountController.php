<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Discount;
use yii\filters\VerbFilter;

class DiscountController extends Controller
{

    public function actionCreate($name, $percentage)
    {   
        $discount = new Discount();
               $discount->discount_name = $name;
               $discount->discount_percentage = $percentage;
       $discount->save(); 
    }



    public function actionUpdate($id, $name, $percentage)
    {
        $discount = $this->findModel($id);
               $discount->discount_name = $name;
               $discount->discount_percentage = $percentage;
       $discount->save(); 
    }



    public function actionDelete($id)
    {
        $discount = $this->findModel($id);

        if($discount){
            $discount->delete();
        }

    }

    protected function findModel($id)
    {
        if (($model = Discount::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }


}

?>