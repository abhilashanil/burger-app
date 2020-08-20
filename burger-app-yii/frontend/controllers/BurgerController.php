<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Burger controller
 */
class BurgerController extends Controller
{

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
}