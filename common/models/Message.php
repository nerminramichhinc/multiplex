<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $date_sent
 * @property string $user_sent
 * @property string $user_email
 * @property string $message_subject
 * @property string $message_content
 * @property integer $is_read
 * @property integer $is_answered
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_sent'], 'safe'],
            [['message_content'], 'string'],
            [['is_read', 'is_answered'], 'integer'],
            [['user_sent', 'user_email'], 'string', 'max' => 50],
            [['message_subject'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_sent' => 'Date Sent',
            'user_sent' => 'User Sent',
            'user_email' => 'User Email',
            'message_subject' => 'Message Subject',
            'message_content' => 'Message Content',
            'is_read' => 'Is Read',
            'is_answered' => 'Is Answered',
        ];
    }
}
