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
                        'actions' => ['list', 'create', 'delete','update', 'insert', 'add-discount-modal', 'save-discount', 'delete-discount-modal', 'update-discount-modal'],
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
    
    public function actionList()
    {
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
    
    public function actionAddDiscountModal()
    {
        $model = new Discount();        
        return $this->renderAjax('_add_discount_modal', ['model' => $model]);
    }
    
    public function actionDeleteDiscountModal($id)
    {
        return $this->renderAjax('_delete_discount_modal', ['id' => $id]);
    }

    public function actionUpdateDiscountModal($id)
    {
        $model = $this->findModel($id);
        $model->updated_at = date("Y-m-d H:i:s");
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->save();
            return $this->redirect(['discount/list']);
        }
        return $this->renderAjax('_update_discount_modal', ['id'=>$id, 'model' => $model]);
    }
    
    public  function actionSaveDiscount()
    {
        $discount = new Discount();   
        if ($discount->load(Yii::$app->request->post()) && $discount->validate()){
            $discount->created_at = date("Y-m-d H:i:s");
            $discount->updated_at = date("Y-m-d H:i:s");
            $discount->save();
            return $this->redirect(['discount/list']);
        }          
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
        return $this->redirect(Yii::$app->request->referrer);
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