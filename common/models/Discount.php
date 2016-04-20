<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "discount".
 *
 * @property integer $id
 * @property string $discount_name
 * @property integer $discount_percentage
 *
 * @property Ticket[] $tickets
 */
class Discount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discount_percentage'], 'integer'],
            [['discount_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discount_name' => 'Discount Name',
            'discount_percentage' => 'Discount Percentage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['discount_id' => 'id']);
    }
}
