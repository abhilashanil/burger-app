<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $date
 * @property float|null $total
 * @property string|null $name
 * @property string|null $street
 * @property string|null $city
 * @property int|null $zipcode
 * @property string|null $country
 * @property string|null $state
 * @property string|null $email
 * @property string|null $delivery_mode
 *
 * @property OrderIngredients[] $orderIngredients
 * @property User $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date',
                'updatedAtAttribute' => false,
                // 'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' =>false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['date'], 'safe'],
            [['total'], 'number'],
            [['name', 'street', 'city', 'country', 'state', 'email', 'delivery_mode'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['name', 'street', 'city', 'zipcode', 'country', 'state', 'email', 'delivery_mode'], 'required'],
            [['zipcode'], 'integer','min' => 100000, 'max' => 999999],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'date' => 'Date',
            'total' => 'Total',
            'name' => 'Name',
            'street' => 'Street',
            'city' => 'City',
            'zipcode' => 'Zipcode',
            'country' => 'Country',
            'state' => 'State',
            'email' => 'Email',
            'delivery_mode' => 'Delivery Mode',
        ];
    }

    /**
     * Gets query for [[OrderIngredients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderIngredients()
    {
        return $this->hasMany(OrderIngredients::className(), ['order_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getOrderIngredientsList(){
        return OrderIngredients::find()->andWhere([
            'order_id' => $this->id
        ])->one();
    }
}
