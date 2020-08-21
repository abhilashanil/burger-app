<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Ingredients;

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
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    [
                        'actions' => ['orders','checkout','ingredient'],
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
        return $this->render('orders');
    }

    public function actionIngredient()
    {
        $request = Yii::$app->request->post();
        $ingredient = Ingredients::find()->andWhere([
            'name' => $request['ingredient']
        ])->one();
        print_r($ingredient->price);die;
    }
}