<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Genre;
use yii\filters\VerbFilter;

class GenreController extends Controller
{

    public function actionCreate($name)
    {   
        $genre = new Genre();
               $genre->genre_name = $name;
        $genre->save(); 
    }



    public function actionUpdate($id, $name)
    {
        $genre = $this->findModel($id);
               $genre->genre_name = $name;
        $genre->save(); 
    }



    public function actionDelete($id)
    {
        $genre = $this->findModel($id);

        if($genre){
            $genre->delete();
        }

    }

    protected function findModel($id)
    {
        if (($model = Genre::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }


}

?>