<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use frontend\models\Ingredients;
use frontend\models\Orders;
use frontend\models\OrderIngredients;

/**
 * Burger controller
 */
class BurgerController extends Controller
{
    /**
     * behaviors
     *
     * @return void
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'checkout','orders','ingredient','set-ingredients','unset-ingredients'],
                'rules' => [
                    [
                        'actions' => ['index','ingredient','set-ingredients'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    [
                        'actions' => ['orders','checkout','unset-ingredients'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'ingredient' => ['post'],
                ],
            ],
        ];
    }

    /**
     * actionIndex
     *
     * @return void
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * actionSetIngredients
     *
     * @return void
     */
    public function actionSetIngredients(){
        $ingredients = isset($_POST['ingredients']) ? $_POST['ingredients'] : null;
        $orderTotal = isset($_POST['orderTotal']) ? $_POST['orderTotal'] : null;
        if($ingredients!= null && $orderTotal!= null){
            $session = Yii::$app->session;
            if (!$session->isActive){
                $session->open();
            }
            $session->set('ingredients', $ingredients);
            $session->set('orderTotal', $orderTotal);
            return $this->asJson('success');
        }
    }

    /**
     * actionUnsetIngredients
     *
     * @return void
     */
    public function actionUnsetIngredients(){
        $session = Yii::$app->session;
        if ($session->isActive && $session->has('ingredients') && $session->has('orderTotal')){
            $session->remove('ingredients');
            $session->remove('orderTotal');
        }
        return $this->asJson('success');
    }

    public function actionCheckout()
    {
        $model = new Orders();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveIngredients($model->id);
            return $this->redirect(['orders']);
        }
        return $this->render('checkout', [
            'model' => $model,
        ]);
    }
    
    public function actionOrders()
    {
        $userId = \Yii::$app->user->id;
        $userOrder = new ActiveDataProvider ([
            'query' => Orders::find()->andWhere([
            'user_id' => $userId
            ])
        ]);
        return $this->render('orders', [
            'userOrder' => $userOrder,
        ]);
    }

    /**
     * actionIngredient
     *
     * @return void
     */
    public function actionIngredient()
    {
        $request = Yii::$app->request->post();
        $ingredient = Ingredients::find()->andWhere([
            'name' => $request['ingredient']
        ])->one();
        return $this->asJson($ingredient);
    }

    public function saveIngredients($id) {
        $session = Yii::$app->session;
        $ingredients = $session->get('ingredients');
        $model = new OrderIngredients();
        $model['order_id'] = $id;
        foreach($ingredients as  $key=>$value) {
            $model[$key] = $value;
        }
       if($model->save()) {
        $session->remove('ingredients');
        $session->remove('orderTotal');
       }

    }
}