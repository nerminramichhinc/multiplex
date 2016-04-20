<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $id
 * @property integer $ticket_price
 * @property integer $projection_id
 * @property integer $discount_id
 *
 * @property Discount $discount
 * @property Projection $projection
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_price', 'projection_id', 'discount_id'], 'integer'],
            [['discount_id'], 'exist', 'skipOnError' => true, 'targetClass' => Discount::className(), 'targetAttribute' => ['discount_id' => 'id']],
            [['projection_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projection::className(), 'targetAttribute' => ['projection_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_price' => 'Ticket Price',
            'projection_id' => 'Projection ID',
            'discount_id' => 'Discount ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscount()
    {
        return $this->hasOne(Discount::className(), ['id' => 'discount_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjection()
    {
        return $this->hasOne(Projection::className(), ['id' => 'projection_id']);
    }
}
