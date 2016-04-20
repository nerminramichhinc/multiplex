<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Image;
use yii\filters\VerbFilter;

class ImageController extends Controller
{

    public function actionCreate($name, $ordinal, $added, $updated, $movieid)
    {   
        $image = new Image();
               $image->image_name = $name;
               $image->image_ordinal = $ordinal;
               $image->date_added = $added;
               $image->date_updated = $updated;
               $image->movie_id = $movieid;
        $image->save(); 
    }



    public function actionUpdate($id, $ordinal, $updated_at, $movieid)
    {
        $image = $this->findModel($id);
               $image->image_name = $name;
               $image->image_ordinal = $ordinal;
               $image->date_updated = $updated_at;
               $image->movie_id = $movieid;
        $image->save(); 
    }

    public function actionDelete($id)
    {
        $image = $this->findModel($id);

        if($image){
            $image->delete();
        }

    }

    protected function findModel($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }


}

?>