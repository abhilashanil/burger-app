<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Ingredients;
use frontend\models\Orders;
use yii\data\ActiveDataProvider;

/**
 * Burger controller
 */
class BurgerController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'checkout','orders','ingredient'],
                'rules' => [
                    [
                        'actions' => ['index','ingredient'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    [
                        'actions' => ['orders','checkout'],
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

    public function actionCheckout()
    {

        $ingredients = isset($_POST['ingredients']) ? $_POST['ingredients'] : null;
        if($ingredients!= null){
            $session = Yii::$app->session;
            $session->open();
            $session->set('ingredients', $ingredients);
            return 'success';
        }
        return $this->render('checkout');
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

    public function actionIngredient()
    {
        $request = Yii::$app->request->post();
        $ingredient = Ingredients::find()->andWhere([
            'name' => $request['ingredient']
        ])->one();
        return $this->asJson($ingredient);
    }
}