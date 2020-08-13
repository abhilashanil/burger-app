<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $price
 * @property int|null $qty
 *
 * @property OrderIngredients[] $orderIngredients
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['qty'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'qty' => 'Qty',
        ];
    }

    /**
     * Gets query for [[OrderIngredients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderIngredients()
    {
        return $this->hasMany(OrderIngredients::className(), ['ingredient_id' => 'id']);
    }
}
