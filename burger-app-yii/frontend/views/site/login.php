<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <!-- <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p> -->

    <div class="login-container">
        <!-- <div class="col-lg-5"> -->
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'login-input', 'placeholder' =>'User Name'])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['class' => 'login-input', 'placeholder' =>'Password'])->label(false) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <!-- <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div> -->

                <div class="form-group">
                    <?= Html::submitButton('SUBMIT', ['class' => 'login-btn', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        <!-- </div> -->
    </div>
</div>
