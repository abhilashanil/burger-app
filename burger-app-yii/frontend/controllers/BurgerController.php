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

    public function actionOrders()
    {
        return $this->render('orders');
    }
}