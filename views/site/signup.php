<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $model \app\models\SignupForm
 */
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Заполните поля ниже:</p>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'fname')->textInput() ?>
            <?= $form->field($model, 'sname')->textInput() ?>
            <?= $form->field($model, 'lname')->textInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php \yii\widgets\ActiveForm::end(); ?>

        </div>
    </div>
</div>