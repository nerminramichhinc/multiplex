<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Ticket;
use yii\filters\VerbFilter;

class TicketController extends Controller
{

    public function actionCreate($ticket_price, $projection_id, $discount_id)
    {   
        $ticket = new Ticket();
               $ticket->$ticket_price = $ticket_price;
               $ticket->$projection_id = $projection_id;
               $ticket->$discount_id = $discount_id;
       $ticket->save(); 
    }



    public function actionUpdate($id, $ticket_price, $projection_id, $discount_id)
    {
        $ticket = $this->findModel($id);
               $ticket->$ticket_price = $ticket_price;
               $ticket->$projection_id = $projection_id;
               $ticket->$discount_id = $discount_id;
       $ticket->save(); 
    }



    public function actionDelete($id)
    {
        $ticket = $this->findModel($id);

        if($ticket){
            $ticket->delete();
        }

    }

    protected function findModel($id)
    {
        if (($model = Ticket::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }


}

?>