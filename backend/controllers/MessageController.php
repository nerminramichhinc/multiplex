<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Message;
use yii\filters\VerbFilter;

class MessageController extends Controller
{

    public function actionCreate($date_sent, $user_sent, $user_email, $message_subject, $message_content, $is_read, $is_answered)
    {   
        $message = new Message();
               $message->date_sent = $date_sent;
               $message->user_sent = $user_sent;
               $message->user_email = $user_email;
               $message->$message_subject = $message_subject;
               $message->message_content = $message_content;
               $message->is_read = $is_read;
               $message->is_answered = $is_answered;
        $message->save(); 
    }



    public function actionUpdate($id, $date_sent, $user_sent, $user_email, $message_subject, $message_content, $is_read, $is_answered)
    {
        $message = $this->findModel($id);
               $message->date_sent = $date_sent;
               $message->user_sent = $user_sent;
               $message->user_email = $user_email;
               $message->$message_subject = $message_subject;
               $message->message_content = $message_content;
               $message->is_read = $is_read;
               $message->is_answered = $is_answered;
        $message->save(); 
    }



    public function actionDelete($id)
    {
        $message = $this->findModel($id);

        if($message){
            $message->delete();
        }

    }

    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }


}

?>