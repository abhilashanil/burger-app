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
        if($ingredients!= null){
            $session = Yii::$app->session;
            if (!$session->isActive){
                $session->open();
            }
            $session->set('ingredients', $ingredients);
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
        if ($session->isActive && $session->has('ingredients')){
            $session->remove('ingredients');
        }
        return $this->asJson('success');
    }

    public function actionCheckout()
    {
        return $this->render('checkout');
    }
    
    public function actionOrders()
    {
        return $this->render('orders');
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
}