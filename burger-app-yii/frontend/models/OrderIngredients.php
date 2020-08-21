<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_ingredients".
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $salad
 * @property int|null $cheese
 * @property int|null $bacon
 * @property int|null $meat
 *
 * @property Orders $order
 */
class OrderIngredients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_ingredients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'salad', 'cheese', 'bacon', 'meat'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'salad' => 'Salad',
            'cheese' => 'Cheese',
            'bacon' => 'Bacon',
            'meat' => 'Meat',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }
}
