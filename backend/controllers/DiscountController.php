<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Discount;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


class DiscountController extends Controller
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
        
        $query = Discount::find();
        
        $provider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                'pageSize' => 10,
                ],
            'sort' => [
                    'defaultOrder' => [
                    'discount_name' => SORT_DESC, 
                    'created_at' => SORT_DESC,
                    
            ]
        ],
    ]);
        
    return $this->render('list',  [
                'provider'=>$provider,
             ]);
    }




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